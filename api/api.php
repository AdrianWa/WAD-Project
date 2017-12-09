<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

/*
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
*/

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST');
});


// Get All Entries
$app->get('/entries/getall', function(Request $request, Response $response){
    $sql = "SELECT * FROM guestbook_entries";

    try{
        // Get DB Object
        $db = new database();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $entries = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($entries);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//Get specific Entries
$app->get('/entries/get/{site}', function(Request $request, Response $response){
    $site = $request->getAttribute('site');
    $site = $site * 10;
    $sql = "SELECT * FROM guestbook_entries ORDER BY id DESC LIMIT $site";

    try{
        // Get DB Object
        $db = new database();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $entries = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($entries);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


//Add entry
$app->post('/entries/add', function(Request $request, Response $response){
    $name = $request->getParam('name');
    $message = $request->getParam('message');

    test_input($name);
    test_input($message);

    try{
        // Get DB Object
        $db = new database();
        // Connect
        $db = $db->connect();

        $statement = $db->prepare("INSERT INTO guestbook_entries (name, message) VALUES (?, ?)");
        $statement->execute(array($name, $message));
        $db = null;

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
