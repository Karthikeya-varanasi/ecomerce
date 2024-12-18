


<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Hoverboards</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">

                        <ul class="bands-section">
                        <?php
                            $query = "SELECT * FROM `a_brands` WHERE prodect_catogery_id = 30";
                            $brands_catogery = filterTable($query);
                        ?>
                        <?php while($q = mysqli_fetch_array($brands_catogery)):?>
                                                <a href="brand/<?php echo $q['name'];?>" class='catonav-links'> 
                                                    <li class='nav-item'id="special-align"><img src="admin/imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:60px; height: 60px; border-radius:20px; margin:10px"> <?php echo $q['name'];?></li>
                                                </a>
                                                
                                                <?php endwhile;?>

                        <a href="categories/Hoverboard" class='catonav-links'> <button class="btn btn-primary m-2">View All</button></a>
                        </ul>
                                    </div>
                        </div>
                        </div>


                        


                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptionsscooter" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">E-scooter</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">

                        <ul class="bands-section">
                        <?php
                            $query = "SELECT * FROM `a_brands` WHERE prodect_catogery_id = 31";
                            $brands_catogery = filterTable($query);
                        ?>
                        <?php while($q = mysqli_fetch_array($brands_catogery)):?>
                                                <a href="brand/<?php echo $q['name'];?>"  class='catonav-links'> 
                                                    <li class='nav-item'id="special-align"><img src="admin/imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:60px; height: 60px; border-radius:20px; margin:10px"> <?php echo $q['name'];?></li>
                                                </a>
                                                
                                                <?php endwhile;?>

                        <a href="categories/E-Scooter" class='catonav-links'> <button class="btn btn-primary m-2">View All</button></a>
                        </ul>
                                    </div>
                        </div>
                        </div>

                        


                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBothOptionsSegway" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Segway</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">

                        <ul class="bands-section">
                        <?php
                            $query = "SELECT * FROM `a_brands` WHERE prodect_catogery_id = 32";
                            $brands_catogery = filterTable($query);
                        ?>
                        <?php while($q = mysqli_fetch_array($brands_catogery)):?>
                                                <a href="brand/<?php echo $q['name'];?>"  class='catonav-links'> 
                                                    <li class='nav-item'id="special-align"><img src="admin/imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:60px; height: 60px; border-radius:20px; margin:10px"> <?php echo $q['name'];?></li>
                                                </a>
                                                <!-- <a href="brand/<?php echo $q['name'];?>"  class='catonav-links'> 
                                                    <li class='nav-item'id="special-align"><img src="admin/imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:60px; height: 60px; border-radius:20px; margin:10px"> <?php echo $q['name'];?></li>
                                                </a> -->
                                                
                                                <?php endwhile;?>

                        <a href="categories/Segway" class='catonav-links'> <button class="btn btn-primary m-2">View All</button></a>
                        </ul>
                                    </div>
                        </div>
                        </div>

                        


                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBothOptionsPremium" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Premium Brands</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">

                        <ul class="bands-section">
                        <?php
                            $query = "SELECT * FROM `a_brands` WHERE prodect_catogery_id = 4";
                            $brands_catogery = filterTable($query);
                        ?>
                        <?php while($q = mysqli_fetch_array($brands_catogery)):?>
                                                <a href="brand/<?php echo $q['name'];?>"  class='catonav-links'> 
                                                    <li class='nav-item'id="special-align"><img src="admin/imageView.php?brands_id=<?php echo $q["brands_id"];?>" style="width:60px; height: 60px;  border-radius:20px; margin:10px"> <?php echo $q['name'];?></li>
                                                </a>
                                                
                                                <?php endwhile;?>

                        <a href="hoverboards.php?cat_id=4" class='catonav-links'> <button class="btn btn-primary m-2">View All</button></a>
                        </ul>
                                    </div>
                        </div>
                        </div>

                        
