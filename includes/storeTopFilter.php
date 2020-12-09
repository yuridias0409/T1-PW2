<div class="store-filter clearfix">
    <div class="pull-left">
        <div class="row-filter">
            <a href="#"><i class="fa fa-th-large"></i></a>
            <a href="#" class="active"><i class="fa fa-bars"></i></a>
        </div>
        <div class="sort-filter">
            <span class="text-uppercase">Sort By:</span>
            <select class="input sort-products-by">
                <option value="" <?php echo isset($_GET['sort'])?"":"selected"?>></option>
                <option value="ASC" 
                <?php
                    if(isset($_GET['sort'])){ 
                        if($_GET['sort']=="ASC"){
                            echo "selected";
                        }   else{
                            echo "";
                        }
                    }    
                ?>>Menor Preço</option>
                <option value="DESC" <?php 
                    if(isset($_GET['sort'])){ 
                        if($_GET['sort']=="DESC"){
                            echo "selected";
                        }   else{
                            echo "";
                        }
                    }
                ?>>Maior Preço</option>
            </select>
            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
        </div>
    </div>
    <div class="pull-right">
        <div class="page-filter">
            <span class="text-uppercase">Show:</span>
            <select class="input">
                <option value="0">10</option>
                <option value="1">20</option>
                <option value="2">30</option>
            </select>
        </div>
        <ul class="store-pages">
            <li><span class="text-uppercase">Page:</span></li>
            <li class="active">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
        </ul>
    </div>
</div>