<?php include "parts/_header.php" ?>
<main>
    <h2>Add Company</h2>
    <?php
    //<img width="100%" src="assignment-screenshots/07_add-company.png" />
    ?>
    <form action="process.php" method="post">
            <h2 class="log"> login</h2>
            <table class="tab">
                <tr>
                    <td>Personal Photo</td>
                    <td><input type="file" /></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <select name="city">
                            <option value="none" selected disabled hidden>Select City</option>
                            <option value="1">Ramm</option>
                            <option value="2">Qubia</option>
                            <option value="3">shokpa</option>
                            <option value="4">bodros</option>
                            <option value="5">Ramalla</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" /></td>
                </tr>
                <tr>
                    <td>Tel</td>
                    <td><input type="tel" /></td>
                </tr>
                <tr>
                    <td>count</td>
                    <td><input type="text" /></td>
                </tr>
                <tr>
                    <td>Major</td>
                    <td><input type="text" /></td>
                </tr>
                <tr>
                    <td>Detalse</td>
                    <td><textarea  rows="15" cols="100"></textarea></td>
                </tr>
                <tr>
                    <td>Interests</td>
                    <td><textarea  rows="15" cols="100"></textarea></td>
                </tr>
            </table>
            <input type="submit" class="in" value="Add company"/>
            <input type="reset" class="in" value="Clear"/>
            <br>
            <br>
            <a href="companies.php" style="">Cancel and return to company List</a>
            <br>
            <br>
            <br>
        </form>
    <br>
    <br>
    <a href="./companies.php">Cancel and return to Companys List</a>
    <br>
    <br>
</main>
            <aside>
            <h2>Help</h2>
            <p>Add your student details including projects and interests so that companies can select you...</aside>
    </section>
<?php include "parts/_footer.php" ?>

