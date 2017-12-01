<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Airtable</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" media="all" href="../css/stylesheet.css" />		
	</head>

	<body>	
	
		<div class="page-wrapper">
	
			<div class="header-wrapper">	
				<h1>Airtable->MySQL</h1>
				<a href="/datasync" style="font-size: 25px; color: #00B9E6;     text-decoration: underline;">Back</a>
			</div>
		
			<div class="content-wrapper">
		
				<ul>
		
					<?php
						//dbconnet
						$servername = "localhost";
						$username = "root";
						$password = "root";
						$dbname = "recolab1";
						$sql = '';

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);

						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 
						echo "Connected successfully. ";

						$sql = "TRUNCATE TABLE entity;";

						if ($conn->query($sql) === TRUE) {
						    echo "New record created successfully";
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}

						// Airtable API key. 
						// To get your API key, visit: https://airtable.com/api
						define ( 'AIRTABLE_API_KEY', 'keyIvQZcMYmjNbtUO' );

						// Airtable App ID.
						// To get this value, look at the Authentication notes in the API docs.
						// Example: $ curl https://api.airtable.com/v0/appZZ12rVdg6qzyC/foo...
						// .. where "appZZ12rVdg6qzyC" is the App ID.
						define ( 'AIRTABLE_APP_ID', 'appjZwdG34KPEajCI' );
						
						// Airtable API URL.
						// Default: https://api.airtable.com/v0/
						define ( 'AIRTABLE_API_URL', 'https://api.airtable.com/v0/' );
					
						// Initialize a curl session.
						$ch = curl_init();
						
						// Specify the type of HTTP request that we'll be sending.
						// In this case, we'll be sending GET requests.
						curl_setopt( $ch, CURLOPT_HTTPGET, 1 );		
						
						// Request that the raw output be returned.
						curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );	
						
						// Specify a timeout value (in seconds).
						curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );

						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	

						// Create an array to use to pass parameters via HTTP headers.
						$http_headers = array();						
						
						// We need to pass the AirTable API key as an HTTP header, so add it to the array.
						$http_headers[] = 'Authorization: Bearer ' . AIRTABLE_API_KEY;		
						
						// Specify the HTTP headers to send.
						curl_setopt( $ch, CURLOPT_HTTPHEADER, $http_headers );	
						// Initialize the offset.
						$offset = '';

						while ( ! is_null ( $offset ) ) {

						$airtable_url = AIRTABLE_API_URL . AIRTABLE_APP_ID;
							// We're also specifying a table.
							$airtable_url .= '/Entity';
							// And we're specifying a view. The API will honor any filters 
							// that have been applied to the view, as well as any sort
							// order that has been applied to it.
							$airtable_url .= '?api_key=' . AIRTABLE_API_KEY;
							// By default, the APi will return 100 records per request.
							// You can specify smaller batch sizes using the "limit"
							// query parameter, as we are here.																					
							//$airtable_url .= '&limit=10';
							// We're using an offset to get specific batches of records.
							$airtable_url .= '&offset=' . $offset;							
							// We're also specifying a sort order for the request,
							// which will override any sort order that has been 
							// applied on the view.
							$airtable_url .= '&sortField=Name&sortDirection=asc';

							curl_setopt( $ch, CURLOPT_URL, $airtable_url );		
									
							// Execute the request.
							$response_json = curl_exec( $ch );
		
							// If there was a curl error encountered while making the call...
							if ( curl_errno( $ch ) != 0 ) {
		
								// Show an error message with the CURL error code.
								// For a complete list of error codes, see:
								// http://curl.haxx.se/libcurl/c/libcurl-errors.html 
								echo '<h2>CURL Error</h2>';
								echo 'Code: ' . curl_errno( $ch );
								die;
		
							} 

							// Decode the JSON-formatted response that was received from the Airtable API.
							$airtable_response = json_decode( $response_json, TRUE );
		
							// If the Airtable API returned an error...
							if ( array_key_exists ( 'error', $airtable_response ) ) {
		
								// Show an error message.
								echo '<h2>Airtable Error</h2>';
								echo 'Type: ' . $airtable_response['error']['type'] . '<br />';
								echo 'Message: ' . $airtable_response['error']['message'] . '<br />';
								die;			
		
							}

							$sql = '';
							$status='';
							$small='';
							
							foreach ( $airtable_response['records'] as $record ) {
					
								// Add each artist to the list, wrapped with a URL to the details page.
								// Note that we're passing the Airtable-assigned record ID.
								echo '<li>';
								echo '<a href="artist.php?id=' . $record['id'] . '">';
								echo $record['fields']['Name'] . '</a>';
								echo '</li>';

								$name = str_replace("'","\'",$record['fields']['Name']);
								$description = str_replace("'","\'",$record['fields']['Description']);
								$phase = implode(", ", $record['fields']['Phase']);
								$facets = implode(", ", $record['fields']['Facets']);
								$entities = implode(", ", $record['fields']['Entities']);
								$status= str_replace("'","\'",$record['fields']['Status']);
								$usability= (int)$record['fields']['Usability'];
								$website = str_replace("https://","",$record['fields']['Website']);
								$website = str_replace("http://","",$website);
								$geographic_reach = implode(", ", $record['fields']['Geographic Reach']);
								$locations = implode(", ", $record['fields']['Locations']);
								$resources = implode(", ", $record['fields']['Resources']);
								$internal_notes= str_replace("'","\'", $record['fields']['Internal Notes']);
								$slug= str_replace("'","\'", $record['fields']['Slug']);
								$url = '';
								$small='';
								$large='';
								foreach ($record['fields']['Images'] as $key => $image) {
									try {
										$url .= $image["url"].',';
									} catch (Exception $e) {
										echo 'Caught exception: ',  $e->getMessage(), "\n";
									}
									try {
										$small .= $image["thumbnails"]["small"]["url"].',';
									} catch (Exception $e) {
										echo 'Caught exception: ',  $e->getMessage(), "\n";
									}
									try {
										$large .= $image["thumbnails"]["large"]["url"].',';
									} catch (Exception $e) {
										echo 'Caught exception: ',  $e->getMessage(), "\n";
									}
								// $sql = "INSERT INTO entity (entity_id, name, description, type, phase, facets, entities, status, usability, website, get_involved,  rss, twitter, images_url, images_small, images_large, geographic_reach, locations, abbreviation, resources, additional_information, internal_notes, date_added, slug, iid, uid, source, source_date_added)
								// VALUES ( '{$record['id']}', '{$name}', '{$description}', '{$record['fields']['Type']}', '{$phase}', '{$facets}', '{$entities}', '{$status}', '{$record['fields']['Usability']}', '{$record['fields']['Website']}', '{$record['fields']['Get Involved']}', '{$record['fields']['RSS']}', '{$record['fields']['Twitter']}', '{$url}', '{$small}', '{$large}', '{$geographic_reach}', '{$locations}', '{$record['fields']['Abbreviation']}', '{$resources}', '{$record['fields']['Additional Information']}', '{$record['fields']['Internal Notes']}', '{$record['fields']['Date Added']}', '{$record['fields']['Slug']}', '{$record['fields']['IID']}', '{$record['fields']['UID']}', '{$record['fields']['Source']}', '{$record['fields']['Source Date Added']}');";
								}
								$sql = "INSERT INTO entity (entity_id, name, description, type, phase, facets, entities, status, usability, website, get_involved,  rss, twitter, images_url, images_small, images_large, geographic_reach, locations, abbreviation, resources, additional_information, internal_notes, date_added, slug, iid, uid, source, source_date_added)
								VALUES ( '{$record['id']}', '{$name}', '{$description}', '{$record['fields']['Type']}', '{$phase}', '{$facets}', '{$entities}', '{$status}', '{$usability}', '{$website}', '{$record['fields']['Get Involved']}', '{$record['fields']['RSS']}', '{$record['fields']['Twitter']}', '{$url}', '{$small}', '{$large}', '{$geographic_reach}', '{$locations}', '{$record['fields']['Abbreviation']}', '{$resources}', '{$record['fields']['Additional Information']}', '{$internal_notes}', '{$record['fields']['Date Added']}', '{$slug}', '{$record['fields']['IID']}', '{$record['fields']['UID']}', '{$record['fields']['Source']}', '{$record['fields']['Source Date Added']}');";

								if ($conn->query($sql) === TRUE) {
								    echo "New record created successfully";
								} else {
								    echo "Error: " . $sql . "<br>" . $conn->error;
								}
							}
							$offset = $airtable_response['offset'];
						}
						$conn->close();
						// Close the curl session.
						curl_close( $ch );

		
					?>				
	
				</ul>
		
			</div>
		
		</div>
		
	</body>
	
</html>