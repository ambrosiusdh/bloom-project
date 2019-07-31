<template>
    <div class="app">
        <div class="app__container-sidebar" :class="{'app__container-sidebar-show': showMenu}"></div>
        <div class="app__sidebar" :class="{'app__sidebar-show': showMenu}">
            <ul class="app__sidebar-list">
                <li class="app__sidebar-list-item">Menu 1</li>
                <li class="app__sidebar-list-item">Menu 2</li>
                <li class="app__sidebar-list-item">Menu 3</li>
                <li class="app__sidebar-list-item">Menu 4</li>
            </ul>
        </div>

        <nav class="app__navbar">
            <i @click="toggleMenu" class="fa fa-bars"></i>
            Logo
        </nav>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
        data: function(){
            return {
                showMenu: false
            }
        },
        methods: {
            toggleMenu(){
                this.showMenu = !this.showMenu;
            }
        }
    }
</script>

<style scoped>
    .app{
        background-color: #F6F7EB;
        font-family: "Trebuchet MS";
    }

    .app__container-sidebar{
        width: 100%;
        height: 0;
        background-color: rgba(0,0,0,0.5);
        position: absolute;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s linear;
    }

    .app__container-sidebar-show{
        height: 100vh;
        opacity: 1;
    }

    .app__sidebar{
        width: 20%;
        height: 100vh;
        background-color: #db222a;
        position: absolute;
        left: -20%;
        transition: 0.5s;
        z-index: 5;
    }

    .app__sidebar-show{
        left: 0;
    }

    .app__navbar{
        padding: 5px 15px;
        width: 100%;
        height: 8vh;
        background-color: #db222a;
        font-size: 36px;
    }

    .app__navbar .fa-bars{
        color: #F6F7EB;
        cursor: pointer;
        transition: 0.2s;
    }

    .app__navbar .fa-bars:hover{
        color: lightgrey;
    }
</style>
