<main class="d-flex align-items-center justify-content-center height-100" >
          <div class="content">
               <div class="container">
                    <div class="grid">                              
                              <div class="form bg-dark-transparent rounded">  
                                <form action="<?= FRONT_ROOT ?>User/RegisterNew" method="POST">

                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control form-control-lg" required/>

                                    <label>Apellido</label>
                                    <input type="text" name="lastName" class="form-control form-control-lg" required/>

                                    <label>DNI</label>
                                    <input type="text" name="id" class="form-control form-control-lg" required/>

                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" required/>

                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg heading nospace" required/>

                                    <button class="btn btn-primary btn-block btn-lg heading nospace" type="submit">Sign Up</button>

                                </form>
                            </div>
                    </div>
               </div>
          </div>
</main>
