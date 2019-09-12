<template>
    <div class="app">
        <div class="app__sidebar-burger">
            <div class="app__sidebar-burger-item">
                <i @click="toggleMenu" class="fa fa-bars" :class="{'app__sidebar-burger-item-rotated': showMenu}"></i>
            </div>
            <transition name="fade">
                <ul class="app__sidebar-burger-list" v-show="!showMenu">
                    <li class="app__sidebar-burger-list-item">
                        <router-link :to="{name: 'index'}" @click.native="changeActiveMenu('dashboard')"><i
                            class="fas fa-chart-line"></i></router-link>
                    </li>
                    <li class="app__sidebar-burger-list-item">
                        <router-link :to="{name: 'data'}" @click.native="changeActiveMenu('data')"><i
                            class="fas fa-database"></i></router-link>
                    </li>
                    <li class="app__sidebar-burger-list-item">
                        <router-link :to="{name: 'history'}" @click.native="changeActiveMenu('history')"><i
                            class="fas fa-scroll"></i></router-link>
                    </li>
                    <li class="app__sidebar-burger-list-item">
                        <router-link :to="{name: 'cashier'}" @click.native="changeActiveMenu('cashier')"><i
                            class="fas fa-dollar-sign"></i></router-link>
                    </li>
                </ul>
            </transition>
        </div>
        <div class="app__sidebar" :class="{'app__sidebar-show': showMenu}">
            <ul class="app__sidebar-list">
                <li class="app__sidebar-list-item"
                    :class="{'app__sidebar-list-item-active': activeMenu === 'dashboard'}">
                    <router-link :to="{name: 'index'}" @click.native="changeActiveMenu('dashboard')"><i
                        class="fas fa-chart-line"></i> Dashboard
                    </router-link>
                </li>
                <li class="app__sidebar-list-item" :class="{'app__sidebar-list-item-active': activeMenu === 'data'}">
                    <router-link :to="{name: 'data'}" @click.native="changeActiveMenu('data')"><i
                        class="fas fa-database"></i> Data
                    </router-link>
                </li>
                <li class="app__sidebar-list-item" :class="{'app__sidebar-list-item-active': activeMenu === 'history'}">
                    <router-link :to="{name: 'history'}" @click.native="changeActiveMenu('history')"><i
                        class="fas fa-scroll"></i> History
                    </router-link>
                </li>
                <li class="app__sidebar-list-item" :class="{'app__sidebar-list-item-active': activeMenu === 'cashier'}">
                    <router-link :to="{name: 'cashier'}" @click.native="changeActiveMenu('cashier')"><i
                        class="fas fa-dollar-sign"></i> Cashier
                    </router-link>
                </li>
            </ul>
        </div>

        <div class="app__main-layout" :class="{'app__main-sidebar-show': showMenu}">
            <nav class="navbar navbar-light navbar-expand-lg app__main-layout-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        {{currentTime}}
                    </li>
                </ul>
            </nav>
            <router-view></router-view>
        </div>

    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "App",
        data: function () {
            return {
                showMenu: false,
                activeMenu: "dashboard",
                currentTime: ""
            }
        },
        created() {
            setInterval(() => {
                this.currentTime = moment().format('MMMM Do YYYY, h:mm:ss a')
            }, 1000)
        },
        methods: {
            toggleMenu() {
                this.showMenu = !this.showMenu;
            },
            changeActiveMenu(menu) {
                this.activeMenu = menu;
                console.log(this.activeMenu);
            }
        }
    }
</script>

<style scoped>

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    .app {
        background-color: #F6F7EB;
        font-family: "Trebuchet MS";
    }

    .app__sidebar {
        width: 15%;
        height: 100vh;
        background-color: #444;
        position: absolute;
        left: -12%;
        transition: 0.5s;
        z-index: 5;
        padding-top: 38px;
    }

    .app__sidebar-show {
        left: 3%;
    }

    .app__sidebar-list {
        padding: 0;
    }

    .app__sidebar-list-item {
        list-style-type: none;
        transition: 0.2s;
    }

    .app__sidebar-list-item a {
        color: white;
        display: block;
        padding: 15px 10px;
    }

    .app__sidebar-list-item:hover a {
        color: lightgrey;
        text-decoration: none;
    }

    .app__sidebar-list-item a i {
        font-size: 14px;
        width: 25px;
        text-align: center;
    }

    .app__sidebar-list-item-active {
        border-left: 4px solid #C51F31;
        background-color: #222;
    }

    .app__sidebar-burger {
        padding-top: 5px;
        text-align: center;
        width: 3%;
        height: 100vh;
        background-color: #222;
        font-size: 20px;
        color: #C51F31;
        position: fixed;
        left: 0;
        z-index: 10;
    }

    .app__sidebar-burger-item .fa-bars {
        color: #C51F31;
        cursor: pointer;
        transition: 0.3s;
    }

    .app__sidebar-burger-item-rotated {
        transform: rotate(90deg);
    }

    .app__sidebar-burger-list {
        padding: 0;
    }

    .app__sidebar-burger-list-item a {
        padding: 10px 0;
        display: block;
        color: white;
        transition: 0.2s;
    }

    .app__sidebar-burger-list-item a:hover {
        color: lightgrey;
        text-decoration: none;
    }

    .app__main-layout {
        width: 97%;
        margin-left: 3%;
        transition: 0.5s;
    }

    .app__main-sidebar-show {
        width: 82%;
        margin-left: 18%;
    }

    .app__main-layout-navbar {
        background-color: #444;
        color: white;
    }

</style>
