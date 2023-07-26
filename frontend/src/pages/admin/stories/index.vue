<template>
    <a-card title="Quản Lý Vai Trò" style="width: 100%; text-align: center;">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <a-button type="primary">
                    <router-link :to="{ name: 'admin-stories-create' }">
                        <i class="fa-solid fa-plus"></i>
                    </router-link>
                </a-button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="stories" :columns="columns" :scroll="{ x: 576 }" bordered>
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span> {{ index + 1 }} </span>
                        </template>
                        <template v-if="column.key === 'action'">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <router-link :to="{ name: 'admin-stories-edit', params: { id: record.id } }">
                                        <a-button type="primary" class="me-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a-button>
                                    </router-link>
                                    <a-popconfirm placement="top" ok-text="Yes" cancel-text="No"
                                        @confirm="confirm(record.id)">
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
        useMenu().onSelectedKeys(["admin-stories"]);

        const stories = ref([]);
        const columns = [
            {
                title: '#',
                key: 'index',
                width: 50,
                align: 'center',
            },
            {
                title: 'Tên Truyện',
                dataIndex: 'story_name',
                key: 'story_name',
                width: 200,
                align: 'center',
            },
            {
                title: 'Tên Tác Giả',
                dataIndex: 'author_name',
                key: 'author_name',
                width: 200,
                align: 'center',
            },
            {
                title: 'Tên Người Đăng',
                dataIndex: 'username',
                key: 'username',
                width: 200,
                align: 'center',
            },
            {
                title: 'Lượt Xem',
                dataIndex: 'view',
                key: 'view',
                width: 200,
                align: 'center',
            },
            {
                title: 'Giới Thiệu',
                dataIndex: 'describe',
                key: 'describe',
                width: 200,
                align: 'center',
            },
            {
                title: 'Trạng Thái',
                dataIndex: 'status',
                key: 'status',
                width: 200,
                align: 'center',
            },
            {
                title: 'Nguồn Truyện',
                dataIndex: 'source',
                key: 'source',
                width: 200,
                align: 'center',
            },
            {
                title: 'Công cụ',
                key: 'action',
                fixed: 'right',
                width: 150,
                align: 'center',
            },
        ];

        const getAuthors = () => {
            axios.get("http://localhost:8000/api/story")
                .then((response) => {
                    stories.value = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        };
        getAuthors();

        const confirm = (id) => {
            axios.delete("http://localhost:8000/api/story/" + id)
                .then((response) => {
                    message.success('Xóa thành công.');
                    setTimeout(function() { location.reload(); }, 500);
                    
                })
                .catch(function (error) {
                    message.error('Xóa thất bại.');
                    console.log(error);
                });
        };

        return {
            stories,
            columns,
            confirm
        }
    }
});
</script>