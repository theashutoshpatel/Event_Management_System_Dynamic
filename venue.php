<?php 
include 'admin/db_connect.php'; 
?>
<style>
/* General Styles */
#portfolio .img-fluid {
    width: 100%;
    height: 30vh;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease;
}
.venue-list {
    cursor: pointer;
    border: unset;
    display: flex;
    flex-direction: column;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.venue-list:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.venue-list .carousel {
    position: relative;
    border-bottom: 2px solid #ddd;
}
.venue-list .carousel-inner {
    border-radius: 10px;
}
.venue-list .carousel img {
    border-radius: 10px;
    min-height: 50vh;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.venue-list .carousel img:hover {
    transform: scale(1.1);
}
.venue-list .card-body {
    padding: 1.5em;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.venue-list h3 {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 0.5em;
}
.venue-list small {
    font-style: italic;
    color: #555;
}
.venue-list .truncate {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 1em;
}
.venue-list .badge {
    font-size: 1rem;
    color: #fff;
    background-color: #28a745;
}
.venue-list .book-venue {
    padding: 0.5em 1.5em;
    background-color: #007bff;
    border: none;
    border-radius: 25px;
    color: white;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.venue-list .book-venue:hover {
    background-color: #0056b3;
}

/* Layout Adjustments */
.row-items {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    gap: 2em;
}
.row-items .col-md-6 {
    flex: 0 0 48%;
}
.row-items .col-md-6:nth-child(even) {
    flex: 0 0 48%;
}

/* Responsive Design */
@media (max-width: 768px) {
    .venue-list {
        flex-direction: column;
        border-radius: 10px;
    }
    .row-items .col-md-6 {
        flex: 0 0 100%;
    }
    .venue-list h3 {
        font-size: 1.5rem;
    }
    .venue-list small {
        font-size: 0.85rem;
    }
    .venue-list .book-venue {
        padding: 0.5em 1em;
        font-size: 1.2rem;
    }
}


</style>
        <header class="masthead">
        </header>
            <div class="container-fluid mt-3 pt-2">
                <h4 class="text-center text-white">List of Our Event Venues</h4>
                <hr class="divider">
                <div class="row-items">
                <div class="col-lg-12">
                    <div class="row">
                <?php
                $rtl ='rtl';
                $ci= 0;
                $venue = $conn->query("SELECT * from venue order by rand()");
                while($row = $venue->fetch_assoc()):
                   
                    $ci++;
                    if($ci < 3){
                        $rtl = '';
                    }else{
                        $rtl = 'rtl';
                    }
                    if($ci == 4){
                        $ci = 0;
                    }
                ?>
                <div class="col-md-6">
                <div class="card venue-list <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">

                        <div id="imagesCarousel_<?php echo $row['id'] ?> card-img-top " class="carousel slide" data-ride="carousel">
                            <?php ?>
                              <div class="carousel-inner">
                              
                                    <?php 
                                        $images = array();
                                        $fpath = 'admin/assets/uploads/venue_'.$row['id'];
                                        $images= scandir($fpath);
                                        $i = 1;
                                        foreach($images as $k => $v):
                                            if(!in_array($v,array('.','..'))):
                                                $active = $i == 1 ? 'active' : '';
                                            
                                    ?>
                                         <div class="carousel-item <?php echo $active ?>">
                                          <img class="d-block w-100" src="<?php echo $fpath.'/'.$v ?>" alt="">
                                        </div>
                                    <?php
                                            $i++;
                                            else:
                                                unset($images[$v]);
                                            endif;
                                        endforeach;
                                    ?>
                                     <a class="carousel-control-prev" href="#imagesCarousel_<?php echo $row['id'] ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#imagesCarousel_<?php echo $row['id'] ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                        </div>
                                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center text-center h-100">
                            <div class="">
                                <div>
                                    <h3><b class="filter-txt"><?php echo ucwords($row['venue']) ?></b></h3>
                                    <small><i><?php echo $row['address'] ?></i></small>
                                </div>
                                <div>
                                <span class="truncate" style="font-size: inherit;"><small><?php echo ucwords($row['description']) ?></small></span>
                                    <br>
                                <span class="badge badge-secondary"><i class="fa fa-tag"></i> Rate Per Hour: <?php echo number_format($row['rate'],2) ?></span>
                                <br>
                                <br>
                                <button class="btn btn-primary book-venue align-self-end" type="button" data-id='<?php echo $row['id'] ?>'>Book</button>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                </div>
                <?php endwhile; ?>
                </div>
                </div>
                </div>
            </div>


<script>
    // $('.card.venue-list').click(function(){
    //     location.href = "index.php?page=view_venue&id="+$(this).attr('data-id')
    // })
    $('.book-venue').click(function(){
        uni_modal("Submit Booking Request","booking.php?venue_id="+$(this).attr('data-id'))
    })
    $('.venue-list .carousel img').click(function(){
        viewer_modal($(this).attr('src'))
    })

</script>