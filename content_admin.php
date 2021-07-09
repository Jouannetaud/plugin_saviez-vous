
<form method="POST">

    <div>
        <label for="jour">Jour du post à afficher </label>
        <input type="number" id="jour" name="jour" min=1 max=31 required>
    </div>
    <div>
        <label for="mois"> Mois du post à afficher</label>
        <input type="number" id="mois" name="mois" min=1 max=12 required>
    </div>

    <div>
        <button id="btnrecherche">Rechercher</button>
    </div>

</form>
<?php
 function getForm()
{
    $day = $_POST['jour'];
    $month = $_POST['mois'];

    echo 'jour:' . ' ' . $day;
    echo 'mois:' . ' ' . $month;
}



function getAdminContent(string $arg)
{

        $args = array(

         'category_name'=> 'dernier post',   
        'showposts' => 1,
        'date_query' => array(
            array(
                'month' => getForm(),
                'day'   => getForm(),
                
            ),
        ),
    );


    $the_query = new WP_Query($args);

    // The Loop
    if ($the_query->have_posts()) {
        echo '<ul>';
        while ($the_query->have_posts()) {
            $the_query->the_post();
        echo $arg();
        }
        echo '</ul>';
    } else {
        echo "aucun post n'a été trouvé";
    }
    
    wp_reset_postdata();
} 

  function getTitle()
{ 
 
  $addPost =  '<div class="container-p-post-top">
    <p class="p-in-post-top text-center"> 
        
   <h3><?php echo getAdminContent("get_the_title"); ?></h3>
    <img src="<?php echo getAdminContent("get_the_post_thumbnail_url");?>"></img>
        
    </p>
</div>';

 return $addPost;

 } 
    
   

add_shortcode('post','getTitle');