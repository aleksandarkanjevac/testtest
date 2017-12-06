<!DOCTYPE html>

<html>

<head>

    <title>Test</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <?php
include 'Db.php';

    $conn = Db::getConn();

    $stmt = $conn->prepare('SELECT * FROM drzave');

    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_ASSOC);

    $contacts = $stmt->fetchAll();

    foreach ($contacts as $k=>$v){
    echo '<p class="lista" data-pk="'.$v['id'].'">'.$v['name'].'</p></br>';

    }

?>

        <div id="names"></div>
        <script>
            $(document).on('click', '.lista', function(e) {
                e.preventDefault();
                $('#names').empty();
                var id = $(this).data('pk');
                $.ajax({
                    url: 'test.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            var name = data[i];

                            var table = "<tr>" +
                                "<td>" + name + "</td>" +
                                "</tr>";
                            $(names).append(table);
                        }

                    },

                    error: function(error) {
                        alert('Error:' + JSON.stringify(error));
                    }
                })

            })

        </script>
</body>

</html>
