<?php  
    
    $students = [  
        [  
            "id" => "1",  
            "name" => "John",  
            "email" => "john@abc.com"  
        ],  
        [  
            "id" => "2",  
            "name" => "Harry",  
            "email" => "harry@xyz.com"  
        ],  
        [  
            "id" => "3",  
            "name" => "Scarlet",  
            "email" => "scarlet@abc.com"  
        ],  
        [  
            "id" => "4",  
            "name" => "Jennifer",  
            "email" => "jennifer@xyz.com"  
        ]  
    ];  
     
    $studentsAddress = [  
        [  
            "user_id" => "3",  
            "address" => "Saket, Delhi, India"  
        ],  
        [  
            "user_id" => "1",  
            "address" => "Akshardham, Delhi, India"  
        ]  
    ];  
          


?>      
    
<h1> Multidimensional Array Search By Value Using PHP </h1>  
<table border="1" width="700">  
    <tr>  
        <td>ID</td>  
        <td>Name</td>  
        <td>Email</td>  
        <td>Address</td>  
    </tr>  
    
    <?php foreach ($students as $key => $value): ?>  
    <tr>  
        <td><?php echo $value['id'] ?></td>  
        <td><?php echo $value['name'] ?></td>  
        <td><?php echo $value['email'] ?></td>  
        <td>  
        <?php   
            $key = array_search($value['id'], array_column($studentsAddress, 'user_id'));  
              
            if (!empty($key) || $key === 0) {  
                echo $studentsAddress[$key]['address'];  
            }  
        ?>  
        </td>  
    </tr>  
    <?php endforeach ?>  
</table>  