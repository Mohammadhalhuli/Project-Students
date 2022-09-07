<?php include "parts/_header.php" ?>
<main>
    
    <?php
        //<img width="100%" src="assignment-screenshots/05_companies.png" />
    ?>
    <section>
            <br>
            <h2>Companies List</h2>
            <div>
                
            <form action="" method="get" style="margin: auto; width: 550px; padding: 20px; font-size:20px">
            <label for="find">company Study Major</label>
            <input type="text" id="find">
            <label for="sel">City</label>
            <select name="" id="sel">
                    <option value="1">Ramm</option>
                    <option value="2">Qubia</option>
                    <option value="3">shokpa</option>
                    <option value="4">bodros</option>
                    <option value="5">Ramalla</option>
                </select>
                <input type="submit" value="search">
           </form>
            </div>
            <table class="tab" style="margin: auto;">
           <tr>
               <th>Photo</th>
               <th>Name</th>
               <th>City</th>
               <th>University</th>
               
           </tr>
           <tr>
               <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company one </a></td>
               <td>Ramm</td>
               <td>Birzeit</td>
               
           </tr>
           <tr>
                <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company Two </a></td>
               <td>Qubia</td>
               <td>Birzeit</td>
               
           </tr>
           <tr>
                <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company three </a></td>
               <td>shokpa</td>
               <td>Birzeit</td>
               
           </tr>
           <tr>
                <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company four </a></td>
               <td>bodros</td>
               <td>Birzeit</td>
               
           </tr>
           <tr>
                <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company five </a></td>
               <td>Ramalla</td>
               <td>Birzeit</td>
               
           </tr>
           <tr>
                <td><img src="images/company.png" width="30" height="30"  alt=""></td>
               <td><a href="company.php"> company six </a></td>
               <td>masu</td>
               <td>Birzeit</td>
               
           </tr>
       </table>
            <br>
              
            <a href="./add-company.php">Add company</a>
            <br>
            <br>
        </section>
</main>
        <aside>
            <h2>Distinguished Student</h2>
            <p>Student Ali Ahmad from Birzeit is very
                special and he is looking for training in
                Computer Science...</p>
        </aside>
<?php include "parts/_footer.php" ?>

