<template>
    <div class="login">
        <div class="login--overlay">
            <div class="login__box">
                <div class="login__box-header">
                    <h3>Login</h3>
                </div>
                <div class="login__box-content container">
                    <div class="form-group">
                        <label for="user-id-input">Username</label>
                        <input
                            id="user-id-input"
                            type="text"
                            class="form-control"
                            placeholder="Insert id here"
                            :class="{'login--error-box': errorUsername}"
                            @keypress.enter="validateLogin"
                            v-model="user.username">
                    </div>
                    <div class="form-group">
                        <label for="user-password-input">Password</label>
                        <input
                            id="user-password-input"
                            type="password"
                            class="form-control"
                            :class="{'login--error-box': errorPassword}"
                            @keypress.enter="validateLogin"
                            v-model="user.password">
                    </div>
                </div>
                <div class="login__box-footer">
                    <button class="btn btn-primary" @click="validateLogin">Login</button>
                </div>
                <div class="login--error-message" v-show="errorLogin.show">
                    {{errorLogin.message}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapGetters, mapActions} from 'vuex';
    import * as constant from '../../constant/modulesConstant';

    export default {
        name: "Login",
        data: function () {
            return {
                user: {
                    username: '',
                    password: ''
                },
                errorLogin: {
                    show: false,
                    message: ""
                },
                errorUsername: false,
                errorPassword: false
            }
        },
        created(){
            if(this.$session.get('username')){
                this.changeActiveMenu('dashboard');
                this.$router.push({name: 'index'});
            }
        },
        computed: {
            ...mapGetters({
                currentMenu: constant.CURRENT_MENU,
                apiPath: constant.API_PATH,
                csrfToken: constant.CSRF_TOKEN
            }),

        },
        methods: {
            ...mapActions([
                'changeActiveMenu'
            ]),
            checkUserInput() {
                return this.user.username.length && this.user.password.length
            },
            setUserSession(user){
                this.$session.set('username', user.username);
                this.$session.set('userFullName', user.userFullName);
                this.$emit('userHasLogin');
            },
            validateLogin() {
                this.errorUsername = !this.user.username;
                this.errorPassword = !this.user.password;

                if (!this.checkUserInput()) {
                    this.errorLogin.show = true;
                    this.errorLogin.message = "Please insert the input.";
                    return
                }

                let url = this.apiPath + 'api/login-user';
                axios.post(url, this.user).then(response => {
                    if (response.data.success) {
                        this.setUserSession(
                            {username: response.data.username, userFullName: response.data.userFullName}
                        );
                        this.changeActiveMenu('dashboard');
                        this.$router.push({name: 'index'});
                        return
                    }

                    this.errorLogin.show = true;
                    this.errorLogin.message = response.data.message;
                })
            }
        }
    }
</script>

<style scoped>
    .login {
        font-size: 20px;
        background-image: url("/img/login-bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        width: 100%;
        margin-top: -20px;
        height: calc(100vh - 39px);
    }

    .login--overlay {
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: inherit;
    }

    .login__box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 30vw;
        height: 42vh;
        background-color: white;
        border: 3px solid #EDEDED;
        box-shadow: 13px 22px 59px 2px rgba(0, 0, 0, 0.4);
    }

    .login__box-header {
        padding-top: 3vh;
        text-align: center;
    }

    .login__box-footer {
        text-align: center;
    }

    .login--error-message{
        padding-top: 1vh;
        color: red;
        text-align: center;
        font-size: 16px;
    }

    .login--error-box{
        border-color: red;
    }
</style>
