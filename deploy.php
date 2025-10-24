<?php
// --- CONFIGURATION ---
$logFile = __DIR__ . '/deploy.log';
$repoDir = __DIR__;  // path to your live site
$branch = 'main';

// --- LOGGING FUNCTION ---
function log_message($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

// --- START DEPLOY PROCESS ---
log_message("=== GitHub webhook triggered ===");

// Read raw POST data from GitHub
$payload = file_get_contents('php://input');

// Validate that this is a GitHub push event (optional basic check)
if (empty($payload)) {
    log_message("No payload received — possibly a manual trigger.");
} else {
    log_message("Payload received successfully.");
}

// Perform the git pull
$cmd = "sudo -u www-data git -C $repoDir pull origin $branch 2>&1";
$output = shell_exec($cmd);
log_message("Git Pull Output:\n$output");

// Done
log_message("=== Deployment complete ===\n");

echo "Deployment executed successfully.";
?>

