<template>
    <form @submit.prevent="editStory()">
        <a-card title="Cập Nhật Tài Khoản" style="width: 100%; text-align: center;">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-2 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <a-input placeholder="Tên Truyện" allow-clear v-model:value="story_name"
                            :class="{ 'select-danger': errors.story_name }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.story_name" class="text-danger">{{ errors.story_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-2 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <a-input placeholder="Tên Tác Giả" allow-clear v-model:value="author_name"
                            :class="{ 'select-danger': errors.author_name }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.author_name" class="text-danger">{{ errors.author_name[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-2 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <a-input placeholder="Giới Thiệu Truyện" allow-clear v-model:value="describe"
                            :class="{ 'select-danger': errors.describe }"/>
                            <div class="w-100"></div>
                            <small v-if="errors.describe" class="text-danger">{{ errors.describe[0] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-2 text-start text-sm-end">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Tên Tác Giả: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-10">
                            <a-input placeholder="Nguồn Truyện" allow-clear v-model:value="source"
                            :class="{ 'select-danger': errors.source }"/>
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
import { useRoute } from "vue-router";
import { message } from 'ant-design-vue';
import { useMenu } from "../../../stores/use-menu.js"
import { defineComponent, ref, reactive, toRefs } from "vue";
import axios from "axios";

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-stories"]);

        const routers = useRouter();
        const errors = ref([]);
        const route = useRoute();
        const stories = reactive({
            story_name: '',
            author_name: '',
            describe: '',
            source: ''
        });

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        const getStoryEdit = () => {
            axios.get('http://localhost:8000/api/story/' + route.params.id)
                .then((response) => {
                    stories.story_name = response.data.data.story_name;
                    stories.author_name = response.data.data.author_name;
                    stories.describe = response.data.data.describe;
                    stories.source = response.data.data.source;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        getStoryEdit();

        const editStory = () => {
            axios.put('http://localhost:8000/api/role/' + route.params.id, stories)
                .then((response) => {
                    if (response) {
                        message.success("Cập Nhật Tác Giả Thành Công");
                        routers.push({ name: "admin-stories" });
                    }
                })
                .catch((error) => {
                    errors.value = error.response.data.errors;
                });
        };

        return {
            filterOption,
            editStory,
            ...toRefs(stories),
            errors,
            stories
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