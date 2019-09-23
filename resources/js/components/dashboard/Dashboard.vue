<template>
    <div class="dashboard">
        <div class="dashboard__header">
            <h2 class="dashboard__header-text">Dashboard</h2>
        </div>
        <div class="dashboard__content">
            <div class="dashboard__content-summary dashboard-summary row">
                <div class="col-md-1">

                </div>
                <div class="col-md-3 dashboard-summary__item dashboard-summary__sold-item row">
                    <div class="col-md-3 dashboard-summary__item-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="col-md-8 dashboard-summary__item-detail">
                        <div class="dashboard-summary__item-detail-title">
                            Total Barang Keluar
                        </div>
                        <div class="dashboard-summary__item-detail-quantity">
                            10
                        </div>
                        <div class="dashboard-summary__item-detail-description">
                            Barang
                        </div>
                    </div>
                </div>
                <div class="col-md-3 dashboard-summary__item dashboard-summary__total-income row">
                    <div class="col-md-3 dashboard-summary__item-icon">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <div class="col-md-9 dashboard-summary__item-detail">
                        <div class="dashboard-summary__item-detail-title">
                            Total Pemasukan
                        </div>
                        <div class="dashboard-summary__item-detail-quantity">
                            1000000
                        </div>
                        <div class="dashboard-summary__item-detail-description">
                            Rupiah
                        </div>
                    </div>
                </div>
                <div class="col-md-3 dashboard-summary__item dashboard-summary__near-empty-item row">
                    <div class="col-md-3 dashboard-summary__item-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="col-md-9 dashboard-summary__item-detail">
                        <div class="dashboard-summary__item-detail-title">
                            Stok Barang < 10
                        </div>
                        <div class="dashboard-summary__item-detail-quantity">
                            5
                        </div>
                        <div class="dashboard-summary__item-detail-description">
                            Tipe Barang
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__today-summary dashboard-today row">
                <div class="dashboard-today__recent-histories col-md-9">
                    <div class="dashboard-today__recent-histories-header">
                        <h5 class="dashboard-today__recent-histories-header-text">
                            Riwayat Barang Terjual
                        </h5>
                    </div>
                    <table class="dashboard-today__recent-histories-tables table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Staff</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>September 17th 2019, 4:11:16 pm</td>
                                <td>Admin</td>
                                <td>
                                    <router-link :to="{name: 'history'}" @click.native="changeActiveMenu('history')">Detail</router-link>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>September 17th 2019, 4:11:16 pm</td>
                                <td>Admin</td>
                                <td>
                                    <router-link :to="{name: 'history'}" @click.native="changeActiveMenu('history')">Detail</router-link>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>September 17th 2019, 4:11:16 pm</td>
                                <td>Admin</td>
                                <td>
                                    <router-link :to="{name: 'history'}" @click.native="changeActiveMenu('history')">Detail</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="dashboard-today__recent-histories-more">
                        <router-link :to="{name: 'data'}" @click.native="changeActiveMenu('data')">See more</router-link>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as constant from "../../constant/modulesConstant"
    import {mapGetters, mapActions} from "vuex"

    export default {
        name: "Dashboard",
        computed: {
            ...mapGetters({
                currentMenu: constant.CURRENT_MENU
            })
        },
        methods: {
            ...mapActions([
                'changeActiveMenu'
            ])
        }
    }
</script>

<style scoped>

    .dashboard {
        width: 95%;
        margin: auto;
    }

    .dashboard__header {
        margin-bottom: 25px;
    }

    .dashboard__header-text {
        font-size: 36px;
    }

    .dashboard__content {

    }

    .dashboard-summary{
        margin-bottom: 30px;
    }

    .dashboard-summary__item{
        margin: 0 15px;
        color: white;
    }

    .dashboard-summary__sold-item {
        background-color: #0667C8;
    }

    .dashboard-summary__total-income {
        background-color: #02B399;
    }

    .dashboard-summary__near-empty-item {
        background-color: #DC3546;
    }

    .dashboard-summary__item-icon {
        font-size: 48px;
        position: relative;
    }

    .dashboard-summary__item-icon i{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .dashboard-summary__item-detail{
        padding: 15px
    }

    .dashboard-summary__item-detail-title{
        font-size: 20px;
    }

    .dashboard-summary__item-detail-quantity{
        font-size: 48px;
    }

    .dashboard-summary__item-detail-description{
        font-size: 20px;
        color: #EEE;
    }

    .dashboard-today__recent-histories{
        background-color: white;
        padding: 10px;
    }

    .dashboard-today__recent-histories-header{
        margin-bottom: 20px;
    }

</style>
