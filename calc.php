<?php
header("Content-Type: application/json");

if (isset($_POST["expression"])) {
    $expression = $_POST["expression"];
    
    try {
        $safe_expression = preg_replace("/[^0-9\+\-\*\/\.\(\)]/", "", $expression);
        $result = eval("return " . $safe_expression . ";");    
        if ($result === false) {
            echo json_encode(["error" => "Invalid expression"]);
            exit;
        }
        $xmlFile = "history.xml";
        $xml = simplexml_load_file($xmlFile);
        $entry = $xml->addChild("entry");
        $entry->addChild("expression", htmlspecialchars($expression));
        $entry->addChild("result", $result);
        $entry->addChild("timestamp", date("Y-m-d H:i:s"));
        
        if (count($xml->entry) > 10) {
            unset($xml->entry[0]);
        }
        $xml->asXML($xmlFile);

        $history = [];
        foreach ($xml->entry as $e) {
            $history[] = [
                "expression" => (string)$e->expression,
                "result" => (string)$e->result
            ];
        }

        $history = array_reverse($history);

        echo json_encode([
            "result" => $result,
            "history" => $history
        ]);
    } catch (Exception $e) {
        echo json_encode(["error" => "Calculation error"]);
    }
} else {
    echo json_encode(["error" => "No expression provided"]);
}
?>
