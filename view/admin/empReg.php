<?php
    include_once('header.php');
?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include_once('sidebar.php');
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
                include_once('navbar.php');
            ?>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4 text-center">Employee Registration</h6>
                            <form id="empRegistrationForm">
                                <div class="mb-3">
                                    <label for="empFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="empFirstName"
                                        aria-describedby="emailHelp">
                                    <div id="empFirstNameHelp" class="form-text errorText">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="empLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="empLastName"
                                        aria-describedby="emailHelp">
                                    <div id="empLastNameHelp" class="form-text errorText"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="empNIC" class="form-label">NIC</label>
                                    <input type="text" class="form-control" id="empNIC"
                                        aria-describedby="empNICHelp">
                                    <div id="empNICHelp" class="form-text errorText">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="empPhone" class="form-label">Contact No:</label>
                                    <input type="text" class="form-control" id="empPhone"
                                        aria-describedby="emailHelp">
                                    <div id="empPhoneHelp" class="form-text errorText">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="empEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="empEmail"
                                        aria-describedby="emailHelp">
                                    <div id="empEmailHelp" class="form-text errorText"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="empAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="empAddress"
                                        aria-describedby="emailHelp"></textarea>
                                    <div id="empAddressHelp" class="form-text errorText">
                                    </div>
                                </div>
                                <div class="mb-4">
                                <label for="empRole">Position</label>
                                <select class="form-select" id="empRole"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>
                               
                                <button type="submit" class="btn btn-success" id="testButton">Register</button>
                                <button type="reset" class="btn btn-primary">Cancel</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

            <script></script>
            <!-- Form End -->


            <!-- Footer Start -->
            <?php
                include_once('footer.php');
            ?>