<?php global $exchange; ?>
        <div class="page-title-area">
            <div class="container">
                <div class="page-title">
                    <h1>My account</h1>
                    <h2>Home  |  Account</h2>
                </div>
            </div>
        </div>



        <div class="profile-area">
            <div class="table-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6">
                            <div class="title">
                                <h3>Operation History</h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6">
                            <button style="visibility:hidden;"><span><i class="fas fa-cloud-upload-alt"></i></span>  export csv</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="chart">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pair</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Hash</th>
                                            <th scope="col">State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $exchange->listUserTransactions(); ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


