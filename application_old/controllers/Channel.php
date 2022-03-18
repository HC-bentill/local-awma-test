<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Business_model','res');
		$this->load->model('Channelmodel');
		$this->load->helper('url');
		$this->load->helper('html');
		
		if($this->session->userdata('user_info')['id'] == ''){
			redirect('login');
		}

		if($this->session->userdata('user_info')['first_login'] == 0){
			redirect('change_passwordd');
		}
	}
	
//	page structure
	 public function load_page($data)
    {
        $this->load->view('page_layout/layout',$data);
    }
	
//	load bank page
	
	public function channel(){

		//set last page session
		$this->session->set_userdata('last_page', 'channel');
		buildBreadCrumb(array(
			"label" => "Channel",
			"url" => "channel"
		), TRUE);
		if(has_permission($this->session->userdata('user_info')['id'],'manage channels')){
			$data = array(
				'title' => 'Channel Manager',
				'page' => 'channel/channel',
				'result' => $this->Channelmodel->get_channel(),
			);
			
			$this->load_page($data);
		}else{
			$data = array(
				'title' => 'Permission',
				'page' => 'permission/error'

			);
			$this->load_page($data);
		}
	}

//	update channel status
	public function update_status(){
		$channelid = $this->uri->segment(3);
		$state = $this->uri->segment(4);
		
		$channel = $this->Channelmodel->get_channel_status($channelid);

		if($state == 0){
			$switch = "disabled";
		}else{
			$switch = "enabled";
		}
		// insert into audit tray table
		$info = array(
			'user_id' => $this->session->userdata('user_info')['id'],
			'activity' => "Updated Channel status",
			'status' => true,
			'description' => "$switch $channel channel",
			'user_category' => "admin",
			'channel' => "Web"
		);
		$audit_tray = audit_tray($info);
		//end of insert
			
		$update = $this->Channelmodel->update_status($channelid,$state);
	}

	public function import_business_occupant_records()
	{
		set_time_limit(0);

		$count = 0;
		$successful = 0;
		$failed = 0;
		$csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');
		//	exit($_FILES['file']['name']);
		ini_set('max_execution_time', 0);
		//configure upload
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '10000';

		$this->load->library('upload', $config);

		// do file upload
		if (!$this->upload->do_upload()) {
			$error = $this->upload->display_errors();

			$this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $error . "</div>");
			redirect(base_url() . 'business_occupant');
		} else {
			if (!empty($_FILES['userfile']['name']) && in_array($_FILES['userfile']['type'], $csvMimes)) {
				$file_data = $this->upload->data();
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {

					//open uploaded csv file with read only mode
					$csvFile = fopen($_FILES['userfile']['tmp_name'], 'r');

					// skip first line
					// if your csv file have no heading, just comment the next line
					fgetcsv($csvFile);

					while (($line = fgetcsv($csvFile)) !== FALSE) {

						$raw_data = "";
						$row = 0;
						// $areacode = get_areacode($line[0]);
						// $towncode = get_towncode($line[1]);

						// $owner_exit = owner_exit(trim($line[0]));
						// $code = $this->res->resnumber($line[10], $line[11]);


						//parse data from csv file line by line
						// $code = $this->res->resnumber(trim($line[0]), trim($line[1]));
						// $primary_contact = trim(trim($line[3]));
						// if ($this->input->post('type_of_building') == "Temporary") {
						// 	$gen_rescode = 'AW' . $areacode . $towncode . 'T' . str_pad($code, 4, '0', STR_PAD_LEFT);
						// } else {
						// 	$gen_rescode = 'AW' . $areacode . $towncode . 'B' . str_pad($code, 4, '0', STR_PAD_LEFT);
						// }
						// $bus_sector = get_category1_code($this->input->post('cat1'));
						// $code = $this->res->resnumber(trim($line[0]), trim($line[1]));

						$data['buis_primary_phone'] = trim($line[0]);

						$owner_exit = owner_exit(trim($line[0]));

						// $data['buis_secondary_phone'] = trim($this->input->post('buis_secondary_contact'));
						// $data['buis_website'] = trim($this->input->post('buis_website'));

						$data['buis_occ_code'] = trim($line[1]);
						$data['buis_name'] = trim($line[2]);

						$owner['person_category'] = "Owner";

						$data['accessed'] = 1;
						$rateable_amount = trim($line[12]);
						$rate = 1;
						$category['category1'] = trim($line[4]);
						$category['category2'] = trim($line[5]);
						$category['category3'] = trim($line[6]);
						$category['category4'] = trim($line[7]);
						$category['category5'] = trim($line[8]);
						$category['category6'] = trim($line[9]);

						// $data['buis_email'] = trim($this->input->post('buis_email'));
						$data['buis_property_code'] = "ANDZRDZRB0001";
						// $data['year_of_est'] = trim($this->input->post('year_of_est'));
						// $data['buis_reg_cert_no'] = trim($this->input->post('buis_reg_cert_no'));
						// $data['no_of_employees'] = trim($this->input->post('no_of_employees'));
						$data['no_of_rooms'] = trim($line[15]);
						$data['suburb'] = trim($line[10]);
						// $data['nature_of_buisness'] = $this->input->post('nature_of_buisness');
						// $data['ownership'] = $this->input->post('ownership');

						// $data1['code'] = $code;
						$data["agent_id"] = $this->session->userdata('user_info')['id'];
						$data["agent_category"] = "admin";

						$owner['firstname'] = ucfirst(trim($line[2]));
						$owner['primary_contact'] = trim($line[0]);
						// $data['primary_contact'] = trim($line[0]);


						if ($owner_exit) {
							$owner_id = owner_exit(trim($line[0]));
						} else {
							$owner_id = $this->res->add_owner($owner);
						}
						$data['owner_id'] = $owner_id;
						$bus_id = $this->res->add_business_occ($data);
						$bus_to_owner = $this->res->add_busocc_to_owner($bus_id, $owner_id);
						$category['busocc_id'] = $bus_id;
						$category_insert = $this->res->add_business_occ_category($category);

						if ($data['accessed'] == 1) {
							$accessed = array(
								'product_id' => "1",
								'property_id' => $bus_id,
								'target' => "3",
								'rateable_value' => $rateable_amount,
								'rate' => $rate,
								'invoice_amount' => $rateable_amount * $rate
							);
							$accessed = $this->TaxModel->insert_accessed_record($accessed);
						} else {

						}


						// if ($owner_id) {
						// 	$bus_id = $this->res->add_business($data);

						// 	if ($data['accessed'] == 1) {
						// 		$data = array(
						// 			'product_id' => "12",
						// 			'property_id' => $bus_id,
						// 			'target' => "2",
						// 			'rateable_value' => $rateable_amount,
						// 			'rate' => $rate,
						// 			'invoice_amount' => $rateable_amount * $rate
						// 		);
						// 		$accessed = $this->TaxModel->insert_accessed_record($data);
						// 	} else {
						// 	}

						// 	$category['category1'] = trim($line[4]);
						// 	$category['category2'] = trim($line[5]);
						// 	$category['category3'] = trim($line[6]);
						// 	$category['category4'] = trim($line[7]);
						// 	$category['category5'] = trim($line[8]);
						// 	$category['category6'] = trim($line[9]);
						// 	$category['property_id'] = $bus_id;
						// 	$category_insert = $this->db->insert('busprop_to_category', $category);

						// 	$bus_to_owner = $this->res->add_bus_to_owner($bus_id, $owner_id);

						// 	if ($bus_to_owner) {

						// 		// insert into audit tray
						// 		$info = array(
						// 			'user_id' => $this->session->userdata('user_info')['id'],
						// 			'activity' => "Added a Property",
						// 			'status' => true,
						// 			'user_category' => "admin",
						// 			'description' => "Added a Property with code: $line[1]",
						// 			'channel' => "Web",
						// 		);
						// 		$audit_tray = audit_tray($info);
						// 		//end of insert
						// 	}
						// }
					}
					if ($failed == 0) {
						$status = 1;
					} elseif ($failed > 0) {
						$status = 0;
					}

					//close opened csv file
					fclose($csvFile);

					// insert into audit tray
					$info = array(
						'user_id' => $this->session->userdata('user_info')['id'],
						'activity' => "Imported Records",
						'status' => false,
						'user_category' => "admin",
						'description' => "Imported $count records for business occupant",
						'channel' => "Web",
					);
					$audit_tray = audit_tray($info);
					//end of insert
					if ($audit_tray) {
						$this->session->set_flashdata('message', "<div class='alert alert-success'>Your import was sucessful. Total records: $count; Successful: $successful; Failed: $failed</div>");
						redirect(base_url() . 'business_occupant');
					} else {
						$this->session->set_flashdata('message', "<div class='alert alert-danger'>Sorry, Something went wrong while storing file data.</div>");
						redirect(base_url() . 'business_occupant');
					}
				} else {
					$this->session->set_flashdata('message', "<div class='alert alert-danger'>Sorry, An error occured.</div>");
					redirect(base_url() . 'business_occupant');
				}
			} else {
				$this->session->set_flashdata('message', "<div class='alert alert-danger'>Invalid File Type.</div>");
				redirect(base_url() . 'business_occupant');
			}
		}





		// $code = $this->res->resnumber($this->input->post('area_council'), $this->input->post('town'));
		// $primary_contact = trim($this->input->post('primary_contact'));
		// if ($this->input->post('type_of_building') == "Temporary") {
		// 	$gen_rescode = 'AW' . $areacode . $towncode . 'T' . str_pad($code, 4, '0', STR_PAD_LEFT);
		// } else {
		// 	$gen_rescode = 'AW' . $areacode . $towncode . 'B' . str_pad($code, 4, '0', STR_PAD_LEFT);
		// }
		// $owner['firstname'] = ucfirst(trim($this->input->post('firstname')));
		// $owner['person_category'] = "Owner";
		// $owner['primary_contact'] = trim($this->input->post('primary_contact'));

		// $data['buis_prop_code'] = $gen_rescode; // replace with old_property_code

		// $data['town'] = trim($this->input->post('town'));
		// $data['area_council'] = trim($this->input->post('area_council'));
		// $data['streetname'] = trim($this->input->post('streetname'));

		// $data['new_property_no'] = $gen_rescode;
		// $data['old_property_no'] = trim($this->input->post('old_property_no'));


		// $data['accessed'] = trim($this->input->post('accessed_status'));
		// $rateable_amount = trim($this->input->post('rateable_amount'));
		// $rate = trim($this->input->post('rate'));

		// $data['code'] = $code;

		// if($this->input->post('owner_native') == 'Yes, Resides In Property'){
		// 	$owner['town'] = trim($this->input->post('town'));
		// 	$owner['area_council'] = trim($this->input->post('area_council'));
		// 	$owner['locality_code'] = $towncode;
		// 	$owner['zone_code'] = $areacode;
		// 	$owner['ghpostgps_code'] = trim($this->input->post('ghpost_gps'));
		// }elseif($this->input->post('owner_native') == 'No' || $this->input->post('owner_native') == 'Yes, Does not Reside In Property And In District'){
		// 	$owner['location'] = trim($this->input->post('owner_location'));
		// 	$owner['hometown'] = trim($this->input->post('owner_hometown'));
		// 	$owner['home_district'] = trim($this->input->post('owner_home_district'));
		// 	$owner['region'] = trim($this->input->post('owner_region'));
		// 	$owner['ethnicity'] = trim($this->input->post('owner_ethnicity'));
		// 	$owner['native_language'] = trim($this->input->post('owner_native_language'));
		// 	$owner['ghpostgps_code'] = trim($this->input->post('owner_ghpost_gps'));
		// }else{
		// 	$owner_areacode = get_areacode($this->input->post('owner_area_council'));
		// 	$owner_towncode = get_towncode($this->input->post('owner_town'));
		// 	$owner['town'] = trim($this->input->post('owner_town'));
		// 	$owner['area_council'] = trim($this->input->post('owner_area_council'));
		// 	$owner['locality_code'] = $owner_towncode;
		// 	$owner['zone_code'] = $owner_areacode;
		// 	$owner['ghpostgps_code'] = trim($this->input->post('owner_ghpost_gps'));
		// }


		// $bus_id = $this->res->add_business($data);

		// if (owner_exit(trim($this->input->post('primary_contact')))) {
		// 	$owner_id = owner_exit(trim($this->input->post('primary_contact')));
		// } else {
		// 	$owner_id = $this->res->add_owner($owner);
		// }

		// $bus_to_owner = $this->res->add_bus_to_owner($bus_id, $owner_id);

		// if ($this->input->post('accessed_status') == 1) {
		// 	$data  = array(
		// 		'product_id' => "12",
		// 		'property_id' => $bus_id,
		// 		'target' => "2",
		// 		'rateable_value' => $rateable_amount,
		// 		'rate' => $rate,
		// 		'invoice_amount' => $rateable_amount * $rate
		// 	);
		// 	$accessed = $this->TaxModel->insert_accessed_record($data);
		// } else {
		// }
		// $category = array(
		// 	'property_id' => $bus_id,
		// 	'category1' => $this->input->post('cat1'),
		// 	'category2' => $this->input->post('cat2'),
		// 	'category3' => $this->input->post('cat3'),
		// 	'category4' => $this->input->post('cat4'),
		// 	'category5' => $this->input->post('cat5'),
		// 	'category6' => $this->input->post('cat6'),
		// );
		// $bus_to_category = $this->res->add_bus_to_category($category);

		// if (!$bus_id && !$owner_id && !$bus_to_owner) {
		// 	$this->session->set_flashdata('message', "<div class='alert alert-danger'>
		// 	<strong>Oh Snap! </strong> Your Form Was Not Submitted.
		// </div>");
		// } else {
		// 	// insert into audit tray
		// 	$info = array(
		// 		'user_id' => $this->session->userdata('user_info')['id'],
		// 		'activity' => "Added a Property",
		// 		'status' => true,
		// 		'description' => "Added a Property with code: $gen_rescode",
		// 		'user_category' => "admin",
		// 		'channel' => "Web"
		// 	);
		// 	$audit_tray = audit_tray($info);
		// 	//end of insert

		// 	$echannelid = 1;
		// 	$echannel = $this->Channelmodel->channelstatus($echannelid);
		// 	if ($echannel != 0) {
		// 		$sms_message = "Your Property has been registered successfully on the GNMA Platform.\nYour Property Code is $gen_rescode\nThank You";

		// 		$phone_formatted = ((strlen($primary_contact) > 10) && substr($primary_contact, 0, 3) == '233') ? $primary_contact : '233' . substr($primary_contact, 1, strlen($primary_contact));
		// 		send_sms($phone_formatted, $sms_message);
		// 		$this->session->set_flashdata('message', "<div class='alert alert-success'>
		//     	<strong>Success! </strong> Your Form Was Submitted.
		// 	</div>");
		// 	} else {
		// 		$this->session->set_flashdata('message', "<div class='alert alert-success'>
		//     	<strong>Success! </strong> Your Form Was Submitted.
		// 	</div>");
		// 	}
		// }
		redirect('add_business_property');
	}
}