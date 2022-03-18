<style type="text/css">
    .owner_reside{
        display:none;
    }
    .owner_reside_not{
        display:none;
    }
    .nav-item{
        width: 170px;
    }
    .padding-top-10{
        padding-top: 10px;
    }

</style>
<div class="row">
    <div class="col">
        <section class="card card-featured-bottom card-featured-primary form-wizard" id="w4">
            <?= $this->session->flashdata('message');?>
            <div class="card-body">

                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?=base_url()?>add_product"><i class="fa fa-product-hunt"></i> Product</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="product" class="tab-pane active">
                            <form class="form-horizontal form-bordered" method="post" action="<?=base_url()?>Product/update_cat5" >
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="productname">Product Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=get_product_name($result[0]->product_id) ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="category1_name">Category 1 Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=get_category_name($result[0]->category1_id, 1); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="category2_name">Category 2 Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=get_category_name($result[0]->category2_id, 2); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="category3_name">Category 3 Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=get_category_name($result[0]->category3_id, 3); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="category4_name">Category 4 Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=get_category_name($result[0]->category4_id, 4); ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="cat5name">Category 5 Name</label>
                                    <div class="col-lg-6">
                                        <input type="hidden" name="id" value="<?=$result[0]->id; ?>">
                                        <input type="text" class="form-control" name="cat5name" value="<?=$result[0]->name; ?>" required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</div>
