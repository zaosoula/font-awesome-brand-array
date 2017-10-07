<?
if(empty($_GET['mode'])){
  echo '
  <a href="?mode=json">Generate JSON</a>
  <a href="?mode=js">Generate Javascript</a>
  <a href="?mode=csv">Generate CSV</a>
  <a href="?mode=list">Generate List</a>
  ';
}else{
  require('font-awesome-brand.php');
  switch ($_GET['mode']) {
    case 'json':
      echo json_encode($font_awesome_brand);
      break;
    case 'js':
      echo 'var font_awesome_brand = JSON.parse(\''.json_encode($font_awesome_brand).'\');';
      break;
    case 'csv':
    echo 'Domain,Name,Color,Unicode<br>';
    foreach($font_awesome_brand as $iconName => $iconData){
      echo $iconName.','.$iconData['name'].','.$iconData['color'].','.$iconData['unicode'].'<br>';
    }
    break;
    case 'list':
      echo 'All supported icons ('.count($font_awesome_brand).' icons)<br><br>';
      foreach($font_awesome_brand as $iconName => $iconData){
        echo '- '.$iconName.' : fa-'.$iconData['name'].'<br>';
      }
      break;
  }
}
?>
