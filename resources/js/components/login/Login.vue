<template>
    <div class="login">
        <div class="login--overlay">
            <div class="login__box">
                <div class="login__box-header">
                    <h3>Login</h3>
                </div>
                <div class="login__box-content container">
                    <div class="form-group">
                        <label for="user-id-input">User ID</label>
                        <input
                            id="user-id-input"
                            type="text"
                            class="form-control"
                            placeholder="Insert id here"
                            v-model="user.userId">
                    </div><div class="form-group">
                        <label for="user-password-input">Password</label>
                        <input
                            id="user-password-input"
                            type="password"
                            class="form-control"
                            v-model="user.userPassword">
                    </div>
                </div>
                <div class="login__box-footer">
                    <button class="btn btn-primary" @click="validateLogin">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapGetters} from 'vuex';
    import * as constant from '../../constant/modulesConstant';

    export default {
        name: "Login",
        data: function(){
            return {
                user: {
                    userId: '',
                    userPassword: ''
                }
            }
        },
        computed: {
            ...mapGetters({
                apiPath: constant.API_PATH,
                csrfToken: constant.CSRF_TOKEN
            })
        },
        methods: {
            checkUserInput(){
                return this.user.userId.length && this.user.userPassword.length
            },
            validateLogin(){
                if(!this.checkUserInput){
                    return
                }

                let url = this.apiPath + 'api/login-user';
                axios.post(url, this.user).then(response => {
                    console.log(response);
                })
            }
        }
    }
</script>

<style scoped>
    .login{
        font-size: 20px;
        background-image: url("/img/login-bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        width: 100%;
        margin-top: -20px;
        height: calc(100vh - 39px);
    }

    .login--overlay{
        background-color: rgba(0,0,0,0.5);
        width: 100%;
        height: inherit;
    }

    .login__box{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 30vw;
        height: 40vh;
        background-color: white;
        border: 3px solid #EDEDED;
        box-shadow: 13px 22px 59px 2px rgba(0,0,0,0.4);
    }

    .login__box-header{
        padding-top: 3vh;
        text-align: center;
    }

    .login__box-footer{
        text-align: center;
    }
</style>
