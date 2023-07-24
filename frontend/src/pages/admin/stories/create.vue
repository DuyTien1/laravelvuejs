<template>
    <form @submit.prevent="createStories()">
        <a-card title="Tạo Mới Tác Giả" style="width: 100%; text-align: center;">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.story_name }">Tên Truyện: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input placeholder="Tên Vai Trò" allow-clear v-model:value="story_name"
                                :class="{ 'input-danger': errors.story_name }" />
                            <div class="w-100"></div>
                            <small v-if="errors.story_name" class="text-danger">{{ errors.story_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.author_name }">Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input placeholder="Tên Vai Trò" allow-clear v-model:value="author_name"
                                :class="{ 'input-danger': errors.author_name }" />
                            <div class="w-100"></div>
                            <small v-if="errors.author_name" class="text-danger">{{ errors.author_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.poster_name }">Tên Người Đăng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-select :field-names="{ label: 'author_name', value: 'id', options: 'authors' }" show-search
                                placeholder="Người Đăng" style="width: 100%; text-align: start;" :options="authors"
                                :filter-option="filterOption" v-model:value="author_id"
                                :class="{ 'select-danger': errors.author_id }">
                            </a-select>
                            <div class="w-100"></div>
                            <small v-if="errors.poster_name" class="text-danger">{{ errors.poster_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.describe }">Giới Thiệu Truyện: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input placeholder="Tên Vai Trò" allow-clear v-model:value="describe"
                                :class="{ 'input-danger': errors.describe }" />
                            <div class="w-100"></div>
                            <small v-if="errors.describe" class="text-danger">{{ errors.describe[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span :class="{ 'text-danger': errors.source }">Nguồn Truyện: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-8">
                            <a-input placeholder="Tên Vai Trò" allow-clear v-model:value="source"
                                :class="{ 'input-danger': errors.source }" />
                            <div class="w-100"></div>
                            <small v-if="errors.source" class="text-danger">{{ errors.source[0] }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-4">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-center mx-auto">
                    <a-button class="me-0 me-sm-2 mb-2 mb-sm-0">
                        <router-link :to="{ name: 'admin-stories' }">
                            <span>Hủy</span>
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit">
                        <span>Lưu</span>
                    </a-button>
                </div>
                <div class="col-12">
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
// import { Alert } from "ant-design-vue";
import { useRouter } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js"
import { defineComponent, ref, reactive, toRefs } from "vue";
import axios from "axios";
// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-stories"]);
        const routers = useRouter();
        const errors = ref([]);
        const authors = ref([]);
        const stories = reactive({
            story_name: '',
            author_name: '',
            describe: '',
            source: '',
            author_id: '',
        });

        const filterOption = (input, option) => {
            return option.author_name.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const getAuthors = () => {
            axios.get("http://localhost:8000/api/author")
                .then((response) => {
                    if (response) {
                        authors.value = response.data.data;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        getAuthors();

        const createStories = () => {
            axios.post("http://localhost:8000/api/story", stories)
                .then((response) => {
                    if (response) {
                        message.success("Tạo tác Giả Mới Thành Công");
                        routers.push({ name: "admin-stories" });
                        // console.log(response);
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                    console.log(error);
                });
        };

        return {
            filterOption,
            createStories,
            ...toRefs(stories),
            errors,
            authors
        }
    }
});
</script>

<style>
.select-danger {
    border: 1px solid #ff0000;
}

.input-danger {
    border-color: #ff0000;
}
</style>