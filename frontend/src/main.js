import { createApp } from 'vue';
import { Popconfirm ,Checkbox, Dropdown ,Input, Select, Avatar, Table, Card, Menu, List, Drawer, Button, message } from 'ant-design-vue';
import { createPinia } from 'pinia';
import './style.css';
import router from './router/index.js';
import App from './App.vue';
import axios from 'axios';
import CKEditor from '@ckeditor/ckeditor5-vue';
window.axios = axios;

import './static/fontawesome/css/all.min.css';
import 'ant-design-vue/dist/antd.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';

const app = createApp(App);
const pinia = createPinia();
app.use(pinia);
app.use(Popconfirm);
app.use(Checkbox);
app.use(Dropdown);
app.use(Input);
app.use(Select);
app.use(Avatar);
app.use(Table);
app.use(Card);
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.use(router);
app.use(CKEditor);
app.mount('#app');

app.config.globalProperties.$message = message;
