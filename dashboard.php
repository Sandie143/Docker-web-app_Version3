<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Azubi Africa: List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="width:100%;overflow:hidden">


    <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        <h1><a href="#" rel="dofollow">Guest List: invited</a></h1>
        <button style="position:absolute;right:3rem;padding:.3rem"><a href="index.html" rel="dofollow" style="color:red">Log out</a></button>
    </div>
    <!-- how we display our content -->
    <table class="styled-table">
        <thead>
            <tr>
                <!-- tr is a row, th is the header, add or remove this to see changes on column header -->
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            <!-- start  -->
            <!-- start here -->

            <!-- You will input your dynamo code here.....research on php + dynamo -->
            <!-- tr stands for table row, and td for description..... this will need to be dynamic -->
            <?php
            require __DIR__ . '../vendor/autoload.php';

            use Aws\DynamoDb\DynamoDbClient;  // beats me
            use Aws\DynamoDb\Exception\DynamoDbException;

            // Set up AWS SDK for PHP
            // Instantiate a client with the credentials from the "my_profile_name" profile, <<make sure you get your profile nam right!!!>>
            $sdk = new Aws\Sdk([
                'profile' => 'default',  #this here does the magic work!!
                'region'   => 'us-east-1',
                'version'  => 'latest'
            ]);

            $dynamodb = $sdk->createDynamoDb();

            $tableName = 'GuestBook';

            // // Uncomment to check the error output
            // try {
            //     // Check if the table exists
            //     $result = $dynamodb->describeTable([
            //         'TableName' => $tableName
            //     ]);
            //     echo "All Good and Kicking.\n";
            // } catch (Aws\DynamoDb\Exception\DynamoDbException $e) {
            //     if ($e->getAwsErrorCode() == 'ResourceNotFoundException') {
            //         echo "Table not found.\n";
            //         exit;
            //     } else {
            //         echo "Error describing table: " . $e->getMessage() . "\n";
            //         exit;
            //     }
            // }

            try {
                $result = $dynamodb->scan([
                    'TableName' => $tableName
                ]);

                foreach ($result['Items'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['Name']['S'] . '</td>';
                    echo '<td>' . $item['Email']['S'] . '</td>';
                    echo '<td>' . $item['Country']['S'] . '</td>';
                    echo '<td>' . $item['Region']['S'] . '</td>';
                    echo '</tr>';
                }
            } catch (DynamoDbException $e) {
                echo "Unable to scan:\n";
                echo $e->getMessage() . "\n";
            }
            ?>


            <!-- the end of your dynamo pickups -->


        </tbody>
    </table>

    <!-- styles for our table .... dont tamper -->
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 20%;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>


    <div class="padding-top--64">
        <div class="loginbackground-gridContainer">
            <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                <div class="box-root">
                </div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
        </div>
    </div>
</body>

</html>