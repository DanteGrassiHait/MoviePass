
    <form action="<?= FRONT_ROOT ?>User/RegisterNew" method="POST">

        <label>Nombre</label>
        <input type="text" name="name" required/>

        <label>Apellido</label>
        <input type="text" name="lastName" required/>

        <label>DNI</label>
        <input type="text" name="id" required/>

        <label>Email</label>
        <input type="email" name="email" required/>

        <label>Password</label>
        <input type="password" name="password" required/>

        <button class="btn btn-primary btn-block btn-lg" type="submit">Sign Up</button>

    </form>
