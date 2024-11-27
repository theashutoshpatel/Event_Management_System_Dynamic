<?php 
include 'admin/db_connect.php'; 
?>
<style>
/* Apply a background image to the header */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
}

header.masthead {
    background-image: url('Concert_banner.jpg'); /* Add your attractive banner image here */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    animation: fadeIn 2s ease-out;
    color: white;
}

h3 {
    font-size: 2.5rem;
    animation: slideUp 1s ease-in-out;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); /* Add a shadow to make the text stand out */
}

hr.divider {
    width: 50px;
    border: 2px solid #fff;
    margin: 1rem auto;
}

.container {
    padding: 2rem;
}

.event-list {
    display: flex;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.event-list:hover {
    transform: scale(1.05);
}

.card-body {
    flex-grow: 1;
    background-color: rgba(0, 0, 0, 0.6);
    padding: 1.5rem;
    border-radius: 8px;
}

.card-body h3 {
    font-size: 1.8rem;
    font-weight: bold;
}

.card-body p {
    font-size: 1rem;
}

.banner img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.banner img:hover {
    transform: scale(1.1);
}

button.read_more {
    background-color: #ff8c00;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button.read_more:hover {
    background-color: #ffb84d;
}

@media (max-width: 768px) {
    .event-list {
        flex-direction: column;
    }

    .banner img {
        height: 200px;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes slideUp {
    0% {
        transform: translateY(30px);
    }
    100% {
        transform: translateY(0);
    }
}
#d1 {
    font-size: 2rem; /* Adjust the font size as needed */
    font-weight: bold; /* Optional: make the text bold */
    background: linear-gradient(90deg, rgba(4,3,23,1) 0%, rgba(171,28,28,1) 35%, rgba(23,40,43,1) 100%);
    -webkit-background-clip: text; /* Ensures the gradient is applied to the text */
    color: transparent; /* Set color to transparent so the gradient shows through */
}


</style>

<header class="masthead">
    <div class="container text-center">
        <!-- <h3>Welcome to <?php echo $_SESSION['system']['name']; ?></h3> -->
         <h3>Welcome to <span id="d1">Festiiv Events</span></h3>
        <hr class="divider my-4" />
        <p>Explore our upcoming events!</p>
    </div>
</header>

<div class="container mt-3 pt-2">
    <h4 class="text-center">Upcoming Events</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT e.*, v.venue FROM events e INNER JOIN venue v ON v.id=e.venue_id WHERE DATE_FORMAT(e.schedule, '%Y-%m%-d') >= '".date('Y-m-d')."' AND e.type = 1 ORDER BY UNIX_TIMESTAMP(e.schedule) ASC");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['description']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
    ?>
    <div class="card event-list" data-id="<?php echo $row['id'] ?>">
        <div class="banner">
            <?php if (!empty($row['banner'])): ?>
                <img src="admin/assets/uploads/<?php echo($row['banner']) ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="card-body">
            <h3><?php echo ucwords($row['event']); ?></h3>
            <div><small><p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A", strtotime($row['schedule'])); ?></b></p></small></div>
            <hr>
            <p><?php echo strip_tags($desc); ?></p>
            <button class="btn read_more" data-id="<?php echo $row['id']; ?>">Read More</button>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script>
// Redirect to event detail page on "Read More" click
$('.read_more').click(function() {
    location.href = "index.php?page=view_event&id=" + $(this).attr('data-id');
});

// Hover effect for banner images
$('.banner img').click(function() {
    viewer_modal($(this).attr('src'));
});

// Search filter for events
$('#filter').keyup(function(e) {
    var filter = $(this).val();
    $('.card.event-list .filter-txt').each(function() {
        var txto = $(this).html();
        txt = txto;
        if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
            $(this).closest('.card').toggle(true);
        } else {
            $(this).closest('.card').toggle(false);
        }
    });
});
</script>
