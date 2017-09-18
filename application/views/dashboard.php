<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">content_copy</i>
                </div>
                <div class="card-content">
                    <p class="category">Stok Kadaluarsa</p>
                    <h3 class="title">9/50
                        <small>Item</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="#">Check stok...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">store</i>
                </div>
                <div class="card-content">
                    <p class="category">Keuntungan</p>
                    <h3 class="title">RP 34.245.000</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 1 Mounth
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">info_outline</i>
                </div>
                <div class="card-content">
                    <p class="category">Fixed Issues</p>
                    <h3 class="title">75</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-chart" data-background-color="green">
                    <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-content">
                    <h4 class="title">Penjualan</h4>
                    <p class="category">
                        <!--<span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.-->
                        <span class="text-success">Penjualan tertinggi <?=$dataMaxJual?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Data 7 Hari sebelumnya
                    </div>
                </div>
            </div>
        </div>
                        <!--<div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="orange">
                                    <div class="ct-chart" id="emailsSubscriptionChart"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Email Subscriptions</h4>
                                    <p class="category">Last Campaign Performance</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-chart" data-background-color="red">
                    <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-content">
                    <h4 class="title">Pembelian</h4>
                    <p class="category">
                        <span class="text-danger">Item tertinggi <?=$dataMaxBeli?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Data 7 Hari sebelumnya
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>