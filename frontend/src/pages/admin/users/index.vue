<template>
    <a-card title="Quản Lý Tài Khoản" style="width: 100%; text-align: center;">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <a-button type="primary">
                    <router-link :to="{ name: 'admin-users-create' }">
                        <i class="fa-solid fa-plus"></i>
                    </router-link>
                </a-button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }" bordered>
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span> {{ index + 1 }} </span>
                        </template>
                        <template v-if="column.key === 'action'">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <router-link :to="{ name: 'admin-users-edit', params: { id: record.id } }">
                                        <a-button type="primary" class="me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a-button>
                                    </router-link>
                                    <a-popconfirm placement="top" ok-text="Yes" cancel-text="No" @confirm="confirm(record.id)">
                                        <template #title>
                                            <!-- <i class="fa-solid fa-question danger me-1"></i> -->
                                            <span>Xác nhận xóa?</span>
                                        </template>
                                        <a-button type="danger" class="me-1">
                                            <i class="fa-solid fa-x"></i>
                                        </a-button>
                                    </a-popconfirm>
                                </div>
                            </div>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>

<script>
import { message } from "ant-design-vue";
import { useMenu } from "../../../stores/use-menu.js";
// import { useRouter } from "vue-router";
import { defineComponent, ref } from "vue";
export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const users = ref([]);
        const columns = [
            {
                title: '#',
                key: 'index',
                width: 50,
                align: 'center',
            },
            {
                title: 'Tên User',
                dataIndex: 'username',
                key: 'username',
                align: 'center',
            },
            {
                title: 'Email',
                dataIndex: 'email',
                key: 'email',
                align: 'center',
            },
            {
                title: 'Địa Chỉ',
                dataIndex: 'address',
                key: 'address',
                align: 'center',
            },
            {
                title: 'Số Điện Thoại',
                dataIndex: 'phone',
                key: 'phone',
                align: 'center',
            },
            {
                title: 'Chức Vụ',
                dataIndex: 'role_name',
                key: 'role_name',
                align: 'center',
            },
            {
                title: 'Công cụ',
                key: 'action',
                fixed: 'right',
                align: 'center',
            },
        ];

        const getUsers = () => {
            axios.get("http://localhost:8000/api/user")
                .then((response) => {
                    users.value = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        };
        getUsers();

        const confirm = (id) => {
            axios.delete("http://localhost:8000/api/user/" + id)
                .then((response) => {
                    message.success('Xóa thành công.');
                    setTimeout(function() { location.reload(); }, 500);
                })
                .catch((error) => {
                    message.error('Xóa thất bại.');
                });


        };

        return {
            users,
            columns,
            confirm
        }
    }
});
</script>