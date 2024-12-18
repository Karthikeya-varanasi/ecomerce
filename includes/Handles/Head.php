<?php  

session_start();
    // $con=mysqli_connect('localhost','root','','hoverboards');
require_once './core/conn.php';

    if(mysqli_connect_errno())
    {
    echo 'Failed to connect'.mysqli_connect_error();
    }


    $url=basename($_SERVER['REQUEST_URI']);

    // get meta tag
    $metaqry="SELECT * from meta_tag where meta_url='$url'";
    $metares=mysqli_query($con,$metaqry);
    $metarow=mysqli_num_rows($metares);
    $metadata=mysqli_fetch_assoc($metares);

    $meta_title='';
    $meta_description='';
    $meta_keywords='';
    if($metarow>0)
    {
    $meta_title=$metadata['meta_title'];
    $meta_description=$metadata['meta_description'];
    $meta_keywords=$metadata['meta_keywords'];
    }
    
       $file_name = basename($_SERVER['PHP_SELF']);
      if($file_name=="prodect.php"){
           $prodect_id = $_REQUEST['product_search_id'];
        $p_sql = "SELECT * FROM a_products WHERE urlname = '".$prodect_id."' ";
        $p_query = mysqli_query($conn, $p_sql);
        $product_det = mysqli_fetch_array($p_query);
        $meta_title = $product_det['name'];
          
      }
      
      if($file_name=="brand.php"){
          $brands_id = $_REQUEST['brands_id'];
        $b_sql = "SELECT * FROM a_brands WHERE name = '".$brands_id."' ";
        $b_query = mysqli_query($conn, $b_sql);
        $brands_det = mysqli_fetch_array($b_query);
        $meta_title = $brands_det['name'];
      }
      
      
    
?>

 
     <base href="/">            
    <title><?php echo $meta_title;?> | Megatron India</title>
  
    <meta name="keywords" content="<?php echo $meta_keywords;?>">
    <meta name="description" content="<?php echo $meta_description;?>">

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="assets/images/logo/icon.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/maainn.css">

<script src="https://kit.fontawesome.com/75891b3d0e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="assets/js/jquery-3.7.1.min.js"></script>

<script src="assets/js/custom.js"></script>

<script>
  gtag('event', 'conversion_event_add_to_cart_1', {
  });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JX3ZJYQX3D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JX3ZJYQX3D');
</script>
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-16629774154/w2d3CPPO3_cZEMru2Pk9',
      'event_callback': callback
  });
  return false;
}
</script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<meta name="google-site-verification" content="-WJOh6-Vvv-6ZrirVEesip80eRTSFn_gAYuzvUc1ufM" />
