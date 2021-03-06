<?php

require 'app/start.php';

$objects = $s3->getIterator('ListObjects',[
    'Bucket' => $config['s3']['bucket']
]);

?>

<!doctype html>
  <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <title>Listings</title>
    </head>

    <body>
      <table>
        <thead>
          <tr>
            <th>File</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($objects as $object): ?>
            <tr>
              <td><?php echo $object['Key']; ?></td>
              <td><a href="<?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key'], "+10 seconds"); ?>">View</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </body>
</html>