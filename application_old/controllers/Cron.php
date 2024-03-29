<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('CronModel');
        $this->load->model('TaxModel');
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

//	run cron job

    public function status_cron(){

        $residence = $this->CronModel->get_residence();
        $business = $this->CronModel->get_business_property();
        foreach($residence as $res){
          $get_household_number = $this->CronModel->get_household_count($res->res_code);

          if($get_household_number >= $res->noOfResidents){
            $data = array('status' => 1);
            $where = array('id' => $res->id);

            $update = $this->CronModel->update_residence_status($data, $where);
          }else{
            $data = array('status' => 0);
            $where = array('id' => $res->id);

            $update = $this->CronModel->update_residence_status($data, $where);
          }
        }

        foreach($business as $bus){
          $get_busocc_number = $this->CronModel->get_busocc_count($bus->buis_prop_code);

          if($get_busocc_number >= $bus->noOfOccupants){
            $data = array('status' => 1);
            $where = array('id' => $bus->id);

            $update1 = $this->CronModel->update_busprop_status($data, $where);
          }else{
            $data = array('status' => 0);
            $where = array('id' => $bus->id);

            $update1 = $this->CronModel->update_busprop_status($data, $where);
          }
        }
        if($update && $update1){
          exit("status successfully updated");
        }else{
          exit("something is wrong somewhere");
        }
    }
    
    
    //	run cron job

    public function residence_category_cron(){

        $residence = $this->CronModel->get_residence();
        foreach($residence as $res){
          
            $data = array(
                        'property_id' => $res->id,
                        'category1' => $res->building_type,
                        'category2' => $res->property_type,
                        'category3' => $res->construction_material,
                        'category4' => $res->roofing_type,
                        'category5' => $res->no_of_floors,
                        'category6' => $res->no_of_rooms,
                    );
            
            $insert = $this->CronModel->add_residence_category($data);
          
        }

        if($insert){
          exit("categories successfully inserted");
        }else{
          exit("something is wrong somewhere");
        }
    }
    
    public function busprop_category_cron(){

        $business = $this->CronModel->get_business_property();
        foreach($business as $bus){
          
            $data = array(
                        'property_id' => $bus->id,
                        'category1' => $bus->property_category,
                        'category2' => $bus->buis_sector,
                        'category3' => $bus->property_typee,
                        
                    );
            
            $insert = $this->CronModel->add_busprop_category($data);
          
        }

        if($insert){
          exit("categories successfully inserted");
        }else{
          exit("something is wrong somewhere");
        }
    }

    public function cat_cron(){
        $cat6 = $this->CronModel->get_cat6();

        foreach($cat6 as $cat){
            $data = array('category6_id' => $cat->id);
            $where = array('id' => $cat->id);

            $update1 = $this->CronModel->update_cat6($data, $where);
        }
        if($update1){
            exit("status successfully updated");
        }else{
            exit("something is wrong somewhere");
        }
    }
    
    public function db_update_cron(){

        $this->db->query("UPDATE product_category6 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category6 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category1 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category1 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category2 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category2 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category3 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category3 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category4 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category4 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category5 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category5 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE product_category6 set product_id = 12 WHERE product_id = 2");
        $this->db->query("UPDATE product_category6 set product_id = 13 WHERE product_id = 3");
        $this->db->query("UPDATE residence set invoice_status = 0;");
        $this->db->query("UPDATE buisness_property set invoice_status = 0 where accessed= 0;");
    }
    
    public function busprop_categories_product4_cron(){

        $get_busprop_categories = $this->CronModel->get_busprop_categories();
        
        foreach($get_busprop_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category4 WHERE category3_id = $bus_cat->category3")->row_array()['id'];
            
            $update = $this->db->query("UPDATE busprop_to_category set category4 = '$id' WHERE category3 = $bus_cat->category3");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }
    
    public function busprop_categories_product5_cron(){

        $get_busprop_categories = $this->CronModel->get_busprop_categories();
        
        foreach($get_busprop_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category5 WHERE category4_id = $bus_cat->category4")->row_array()['id'];
            
            $update = $this->db->query("UPDATE busprop_to_category set category5 = '$id' WHERE category4 = $bus_cat->category4");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }
    
    public function busprop_categories_product6_cron(){

        $get_busprop_categories = $this->CronModel->get_busprop_categories();
        
        foreach($get_busprop_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category6 WHERE category5_id = $bus_cat->category5")->row_array()['id'];
            
            $update = $this->db->query("UPDATE busprop_to_category set category6 = '$id' WHERE category5 = $bus_cat->category5");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function busocc_categories_cat5_cron(){

        $get_busocc_categories = $this->CronModel->get_busocc_categories();
        
        foreach($get_busocc_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category5 WHERE category4_id = $bus_cat->category4")->row_array()['id'];
            
            $update = $this->db->query("UPDATE busocc_to_category set category5 = '$id' WHERE category4 = $bus_cat->category4");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function productcategory6_cat5_cron(){

        $get_busocc_categories = $this->CronModel->get_product_category5();
        
        foreach($get_busocc_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category5 WHERE category4_id = $bus_cat->category4_id")->row_array()['id'];
            
            $update = $this->db->query("UPDATE product_category6 set category5_id = '$id' WHERE category4_id = $bus_cat->category4_id");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function productcategory6_cat6_cron(){

        $get_busocc_categories = $this->CronModel->get_product_category6();
        
        foreach($get_busocc_categories as $bus_cat){
            
            $update = $this->db->query("UPDATE product_category6 set category6_id = '$bus_cat->id' WHERE id = $bus_cat->id");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function busocc_categories_cat6_cron(){

        $get_busocc_categories = $this->CronModel->get_busocc_categories6();
        
        foreach($get_busocc_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category6 WHERE category5_id = $bus_cat->category5")->row_array()['id'];
            
            $update = $this->db->query("UPDATE busocc_to_category set category6 = '$id' WHERE category5 = $bus_cat->category5");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function invoice_cat5_cron(){

        $get_busocc_categories = $this->CronModel->get_invoice_category5();
        
        foreach($get_busocc_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category5 WHERE category4_id = $bus_cat->category4_id")->row_array()['id'];
            
            $update = $this->db->query("UPDATE invoice set category5_id = '$id' WHERE category4_id = $bus_cat->category4_id");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function invoice_cat6_cron(){

        $get_busocc_categories = $this->CronModel->get_product_category6();
        
        foreach($get_busocc_categories as $bus_cat){
            $id = $this->db->query("SELECT id from product_category6 WHERE category5_id = $bus_cat->category5_id")->row_array()['id'];
            $update = $this->db->query("UPDATE invoice set category6_id = '$id' WHERE category5_id = $bus_cat->category5_id");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    public function invoice_update_date(){

        $invoices = $this->CronModel->get_invoices();
        
        foreach($invoices as $inv){
            $update = $this->db->query("UPDATE invoice set date_created = '2020-09-16 20:25:25',payment_due_date = '1602090530' WHERE id = $inv->id");
        }
        
        if($update){
            exit("updated successfully");
        }else{
            exit("something is wrong somewhere");
        }
    }

    // this will handle migrating residence prop records into the bus prop
    public function migration(){
        $residences = $this->CronModel->get_all_residence();

        $no_owner = 0;
        $no_category = 0;
        
        foreach($residences as $residence){
            
            $category = 13;
            
            $owner_id = $this->CronModel->get_owner_id($residence->id);
            $data['buis_prop_code'] = $residence->res_code;
            $data['town'] = $residence->town;
            $data['area_council'] = $residence->area_council;
            $data['year_of_construction'] = $residence->year_of_construction;
            $data['streetname'] = $residence->streetname;
            $data['landmark'] = $residence->landmark;
            $data['locality_code'] = $residence->locality_code;
            $data['street_code'] = $residence->street_code;
            $data['category'] = $category;
            $data['new_property_no'] = $residence->new_property_no;
            $data['old_property_no'] = $residence->old_property_no;
            $data['zone_code'] = $residence->zone_code;
            $data['houseno'] = $residence->houseno;
            $data['location'] = $residence->location;
            $data['ghpost_gps'] = $residence->ghpost_gps;
            $data['gps_lat'] = $residence->gps_lat;
            $data['gps_long'] = $residence->gps_long;
            $data['man_gps_lat'] = $residence->man_gps_lat;
            $data['man_gps_long'] = $residence->man_gps_long;
            $data['no_of_rooms'] = $residence->no_of_rooms;
            $data['sectorial_code'] = $residence->sectorial_code;
            $data['construction_material'] = $residence->construction_material;
            $data['roofing_type'] = $residence->roofing_type;
            $data['building_permit'] = $residence->building_permit;
            $data['planning_permit'] = $residence->planning_permit;
            $data['toilet_facility'] = $residence->toilet_facility;
            $data['avai_of_water'] = $residence->avai_of_water;
            $data['avai_of_refuse']= $residence->avai_of_refuse;
            $data['building_status'] = $residence->building_status;
            $data['inhabitant_status'] = $residence->inhabitant_status;
            $data['no_of_residents'] = $residence->noOfResidents;
            $data['resident_greater_18'] = $residence->resident_greater_18;
            $data['building_type'] = $residence->building_type;
            // $data['noOfOccupants'] = $residence->noOfOccupants;;
            $data['upn_number'] = $residence->upn_number;
            $data['assessable_status'] = $residence->assessable_status;
            $data['accessed'] = $residence->accessed;
            $data['image_path'] = $residence->image_path;
            $data['property_image'] = $residence->property_image;
            $data['agent_id'] = $residence->agent_id;
            $data['agent_category'] = $residence->agent_category; 
            // $rateable_amount = $residence->old_property_no;
            // $rate = $residence->old_property_no;
            $data['temporary_building']= $residence->temporary_building;
            $data['code'] = $residence->code;
            $data['no_of_floors'] = $residence->no_of_floors;
            $data['building_cert_no'] = $residence->building_cert_no;
            $data['planning_permit_no'] = $residence->planning_permit_no;
            $data['t_facility_yes'] = $residence->t_facility_yes;
            $data['no_of_toilet_facility'] = $residence->no_of_toilet_facility;
            $data['t_facility_no'] = $residence->t_facility_no;
            $data['source_water_no'] = $residence->source_water_no;
            $data['source_water_yes'] = $residence->source_water_yes;
            $data['dumping_site_yes'] = $residence->dumping_site_yes;
            $data['dumping_site_no'] = $residence->dumping_site_no;
            $data['invoice_status'] = $residence->invoice_status;
            $data['date_created'] = $residence->date_created;

            $bus_id = $this->CronModel->add_property($data);
            $res_code = $residence->res_code;

            if($owner_id){
                $bus_to_owner = $this->CronModel->add_property_to_owner($bus_id,$owner_id);
            }else{
                $no_owner++;
                echo "$res_code has no owner <br>";
            }
            

            if($residence->accessed == 1){
                $access = $this->CronModel->update_access_residence($residence->id,$bus_id);
            }else{
                
            }

            $invoices = $this->CronModel->update_invoice_id($residence->id,$bus_id);

            $res_category = $this->CronModel->get_residence_category($residence->id);

            if($res_category){
                $category = array(
                    'property_id' => $bus_id,
                    'category1' => $res_category['category1'],
                    'category2' => $res_category['category2'],
                    'category3' => $res_category['category3'],
                    'category4' => $res_category['category4'],
                    'category5' => $res_category['category5'],
                    'category6' => $res_category['category6'],
                );
    
                $bus_to_category = $this->CronModel->add_property_to_category($category);
                
            }else{
                $no_category++;
                echo "$res_code has no category <br>";
            }
            
            if(!$bus_id && !$bus_to_owner){
                echo "$res_code was not successfully migrated <br>";
            }else{	
                echo "$res_code has been successfully migrated <br>";

            }
        }
  
    }


    // this will handle migrating residence prop records into the bus prop
    public function arrears(){
        //open uploaded csv file with read only mode
        $csvFile = fopen(base_url().'upload/FIN_BATCH_12.csv', 'r');

        // skip first line
        // if your csv file have no heading, just comment the next line
        fgetcsv($csvFile);

        while(($line = fgetcsv($csvFile)) !== FALSE){
           
            $year = 2020;
            $code = $this->TaxModel->get_code(1,$year);
            $final_code = $code + 1;
            $number = str_pad($final_code, 5, '0', STR_PAD_LEFT);
            $invoice_no = "INVNBOP".$year."-".$number;
            $today =  date('Y-m-d');
            
            $day = strtotime("+21 days", strtotime($today));
            $data = array(
                'invoice_no' => $invoice_no,
                'invoice_due_date' => strtotime(date("Y-m-d H:i:s")),
                'payment_due_date' => $day,
                'property_id' => trim($line[0]),
                'product_id' => 3,
                'category1_id' => trim($line[5]),
                'category2_id' => trim($line[6]),
                'category3_id' => trim($line[7]),
                'category4_id' => trim($line[8]),
                'category5_id' => trim($line[9]),
                'category6_id' => trim($line[10]),
                'invoice_amount' => trim($line[14]),
                'invoice_year' => $year,
                'amount_paid' => trim($line[17])
            );
            $insert = $this->TaxModel->insert_invoice_record($data);

        }
            
    }

    // this script will update business occupant category 
    public function update_business_occ_category(){
        
        //open uploaded csv file with read only mode
        $csvFile = fopen('/Applications/MAMP/htdocs/awma_erms_new/upload/BATCH_11.csv', 'r');

        // skip first line
        // if your csv file have no heading, just comment the next line
        fgetcsv($csvFile);
        while(($line = fgetcsv($csvFile)) !== FALSE){
            
            $id = trim($line[0]);

            $invoice_data = array(
                'category1_id' => trim($line[6]),
                'category2_id' => trim($line[7]),
                'category3_id' => trim($line[8]),
                'category4_id' => trim($line[9]),
                'category5_id' => trim($line[10]),
                'category6_id' => trim($line[11]),
            );

            $busocc_data = array(
                'category1' => trim($line[6]),
                'category2' => trim($line[7]),
                'category3' => trim($line[8]),
                'category4' => trim($line[9]),
                'category5' => trim($line[10]),
                'category6' => trim($line[11]),
            );

            $update_busocc_category = $this->CronModel->update_business_occ_category($busocc_data,$id);
            $update_invoice_category = $this->CronModel->update_invoice_category($invoice_data,$id);

            if(!$update_busocc_category && !$update_invoice_category){
                echo "$id category change was not successful <br>";
            }else{	
                echo "$id category change was successful <br>";

            }

        }
            
    }
    
    

}
