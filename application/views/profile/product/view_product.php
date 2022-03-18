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
                            <a class="nav-link"><i class="fa fa-product-hunt"></i> Product</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="product" class="tab-pane active">
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2" for="productname">Product Name</label>
                                    <div class="col-lg-6 padding-top-10">
                                        <span><?=$result[0]->name; ?></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="<?=base_url()?>edit_product/<?=$result[0]->id; ?>" class="mb-1 mt-1 mr-1 btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</div>
