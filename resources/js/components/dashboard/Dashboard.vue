<template>
    <div class="dashboard">
        <div class="dashboard__header">
            <h2 class="dashboard__header-text">Dashboard</h2>
        </div>
        <div class="dashboard__content">
            <div class="dashboard__content-summary dashboard--item dashboard-summary">
                <div class="dashboard-summary__header">
                    Dashboard Summary
                </div>
                <div class="dashboard-summary__content row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-3 dashboard-summary__content-item dashboard-summary__content-sold-item row">
                        <div class="col-md-3 dashboard-summary__content-item-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="col-md-8 dashboard-summary__content-item-detail">
                            <div class="dashboard-summary__content-item-detail-title">
                                Total Barang Keluar
                            </div>
                            <div class="dashboard-summary__content-item-detail-quantity">
                                10
                            </div>
                            <div class="dashboard-summary__content-item-detail-description">
                                Barang
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 dashboard-summary__content-item dashboard-summary__content-total-income row">
                        <div class="col-md-3 dashboard-summary__content-item-icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <div class="col-md-9 dashboard-summary__content-item-detail">
                            <div class="dashboard-summary__content-item-detail-title">
                                Total Pemasukan
                            </div>
                            <div class="dashboard-summary__content-item-detail-quantity">
                                1000000
                            </div>
                            <div class="dashboard-summary__content-item-detail-description">
                                Rupiah
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 dashboard-summary__content-item dashboard-summary__content-near-empty-item row">
                        <div class="col-md-3 dashboard-summary__content-item-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="col-md-9 dashboard-summary__content-item-detail">
                            <div class="dashboard-summary__content-item-detail-title">
                                Stok Barang < 10
                            </div>
                            <div class="dashboard-summary__content-item-detail-quantity" :class="{'dashboard-summary--warning-quantity': nearEmptyQuantity > 0}">
                                {{nearEmptyQuantity}}
                            </div>
                            <div class="dashboard-summary__content-item-detail-description">
                                Tipe Barang
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dashboard-summary__footer">
                    <router-link class="btn btn-primary" :to="{name: 'data'}" @click.native="changeActiveMenu('data')">See More Information</router-link>
                </div>
            </div>
            <div class="dashboard__today-summary dashboard--item dashboard-today">
                <div class="row">
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
                nearEmptyQuantity: constant.NEAR_EMPTY_QUANTITY,
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

    .dashboard--item{
        background-color: white;
        border: 3px solid #DDD;
        border-radius: 5px;
        padding: 10px;
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

    .dashboard-summary__header{
        border-bottom: 3px solid #EDEDED;
        margin: 0 -10px;
        padding: 10px;
        font-size: 24px;
    }

    .dashboard-summary__content-item{
        margin: 0 15px;
    }

    .dashboard-summary__content-sold-item i{
        color: #0667C8;
    }

    .dashboard-summary__content-total-income i{
        color: #02B399;
    }

    .dashboard-summary__content-near-empty-item i{
        color: #DC3546;
    }

    .dashboard-summary__content-item-icon {
        font-size: 48px;
        position: relative;
    }

    .dashboard-summary__content-item-icon i{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .dashboard-summary__content-item-detail{
        padding: 15px
    }

    .dashboard-summary__content-item-detail-title{
        font-size: 18px;
        color: grey;
    }

    .dashboard-summary__content-item-detail-quantity{
        font-size: 48px;
        line-height: 42px;
        font-weight: bold;
    }

    .dashboard-summary__content-item-detail-description{
        font-size: 18px;
        color: grey;
    }

    .dashboard-summary__footer{
        padding: 10px;
        margin: 0 -10px;
        border-top: 3px solid #EDEDED;
    }

    .dashboard-summary--warning-quantity{
        color: red;
    }

    .dashboard-today__recent-histories{
        padding: 10px;
    }

    .dashboard-today__recent-histories-header{
        margin-bottom: 20px;
    }

</style>
