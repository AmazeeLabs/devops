<?php

$customsiteconfigurations_files = glob("custom-site-configurations/*.json");

foreach ($customsiteconfigurations_files as $file) {
  unset($output);
  echo "Processing: " . $file . "\n";
  // $file = "custom-site-configurations/chymne_ch.json";
  $configuration = json_decode(file_get_contents($file));
  $output['servers'] = $configuration;

  if(array_key_exists('prod1', $output['servers'])){
    echo "PROD Detected!\n";
    $output['groups'] =  array('prod' =>  array('prod1', 'prod2', 'prod3' ));
  } else {
  }

  $output_json = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  $output_filename = str_replace('custom-site-configurations', 'custom-site-configurations-new', $file);

file_put_contents($output_filename, $output_json);

}
