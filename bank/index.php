<!-- bank/index.php -->
<?php
session_start();

// initialize transaction history if it doesn't exist
if (!isset($_SESSION['transactions'])) {
    $_SESSION['transactions'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // record the transaction
    $_SESSION['transactions'][] = [
        'account' => $_POST['account'],
        'amount' => '$100.00',
        'time' => date('Y-m-d H:i:s')
    ];
    
    echo "<h2>Money sent to: " . htmlspecialchars($_POST['account']) . "</h2>";
    echo "<p><a href='/index.php'>Return to bank homepage</a></p>";
    exit;
}

// function to display transaction history
function showTransactionHistory() {
    if (empty($_SESSION['transactions'])) {
        return "<p>No recent transactions.</p>";
    }
    
    $html = "<h2>Recent Transactions</h2>";
    $html .= "<div class='transaction-alert'>You have " . count($_SESSION['transactions']) . " recent transactions!</div>";
    $html .= "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    $html .= "<tr><th>Time</th><th>Recipient</th><th>Amount</th></tr>";
    
    foreach (array_reverse($_SESSION['transactions']) as $transaction) {
        $isHacker = strpos(strtolower($transaction['account']), 'hacker') !== false;
        $rowClass = $isHacker ? "class='suspicious'" : "";
        
        $html .= "<tr $rowClass>";
        $html .= "<td>" . htmlspecialchars($transaction['time']) . "</td>";
        $html .= "<td>" . htmlspecialchars($transaction['account']) . "</td>";
        $html .= "<td>" . htmlspecialchars($transaction['amount']) . "</td>";
        $html .= "</tr>";
    }
    
    $html .= "</table>";
    return $html;
}

// add clear history option
if (isset($_GET['clear'])) {
    $_SESSION['transactions'] = [];
    header('Location: /index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .transaction-alert {
            background-color: #ffe0e0;
            color: #d00;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        tr.suspicious {
            background-color: #ffcccc;
            font-weight: bold;
        }
        .clear-button {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Welcome to CashG!</h1>
    
    <div class="container">
        <h2>Send Money</h2>
        <form method="POST" action="/index.php">
            <label>Send money to:</label><br>
            <input type="text" name="account" value="friend-account"><br><br>
            <label>Amount:</label><br>
            <input type="text" value="$100.00" readonly><br><br>
            <button type="submit">Send Money</button>
        </form>
    </div>
    
    <div class="container">
        <?php echo showTransactionHistory(); ?>
        <?php if (!empty($_SESSION['transactions'])): ?>
            <a href="?clear=1" class="clear-button">Clear Transaction History</a>
        <?php endif; ?>
    </div>
</body>
</html>
