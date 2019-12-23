<div class="space-hig-top">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body box-hubungi pad-rata">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= count($dly_book) ?></h3>
                                    <p>Pesanan Baru</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url('Admin/Pesan/Index/tab_1'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= count($ccl_book) ?></h3>
                                    <p>Pesanan Cancel</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?= base_url('Admin/Pesan/Index/tab_2'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= count($suc_book) ?></h3>
                                    <p>Pesanan Sukses</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?= base_url('Admin/Pesan/Index/tab_3'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= count($all_book) ?></h3>
                                    <p>Semua Pesanan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?= base_url('Admin/Pesan/Index/tab_4'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-6 connectedSortable">
                           <div class="box box-primary">
                                <div class="box-header with-border">
                                    <i class="fa fa-bar-chart-o"></i>

                                    <h3 class="box-title">Grafik Pesanan</h3>
                                </div>
                                <div class="box-body">
                                    <div id="donutchart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </section>
                        
                        <section class="col-lg-6">
                            <div class="box box-solid bg-yellow-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>

                                    <h3 class="box-title">Kalender</h3>
                                </div>
                                <!-- /.box-header-->
                                <div class="box-body no-padding">
                                    <!-- The calendar-->
                                    <div id="calendar" style="width: 100%"></div>
                                </div>
                            </div>
                        </section>

                        <script>
                            <?php
                                $no_menunggu  = count($dly_book);
                                $no_batal     = count($ccl_book);
                                $no_sukses    = count($suc_book);
                                $no_all       = count($all_book);
                            ?>
                            $(function() {
                                var donutData = [{
                                    label: 'Pesanan Baru',
                                    data: <?=$no_menunggu?>,
                                    color: '#f39c12'
                                },
                                {
                                    label: 'Pesanan Batal',
                                    data: <?=$no_batal?>,
                                    color: '#dd4b39'
                                },
                                {
                                    label: 'Pesanan Sukses',
                                    data: <?=$no_sukses?>,
                                    color: '#00a65a'
                                }]
                                $.plot('#donutchart', donutData, {
                                    series: {
                                        pie: {
                                            show: true,
                                            radius: 1,
                                            label: {
                                                show: true,
                                                radius: 2 / 3,
                                                formatter: labelFormatter,
                                                threshold: 0.1
                                            }

                                        }
                                    },
                                    legend: {
                                        show: true
                                    }
                                })
                            });

                            function labelFormatter(label, series) {
                                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                                    label +
                                    '<br>' +
                                    series.data[0][1] + '</div>'
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>