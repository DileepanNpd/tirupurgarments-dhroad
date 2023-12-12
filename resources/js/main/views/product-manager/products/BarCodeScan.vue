<template>
    <a-button type="text" @click="openModal">
        <template #icon>
            <CameraOutlined />
        </template>
    </a-button>

    <a-modal
        :open="visible"
        :closable="false"
        :destroyOnClose="true"
        :centered="true"
        title="BarCodeScanner"
    >
        <a-form layout="vertical">
            <a-row :gutter="16">
                <a-col :xs="24" :sm="24" :md="24" :lg="24">
                    <StreamBarcodeReader @decode="onDecode" @loaded="onLoaded" />
                </a-col>
            </a-row>
        </a-form>
        <template #footer>
            <a-button key="back" @click="closeModal">
                {{ $t("common.cancel") }}
            </a-button>
        </template>
    </a-modal>
</template>
<script>
import { defineComponent, ref } from "vue";
import { CameraOutlined } from "@ant-design/icons-vue";
import { StreamBarcodeReader } from "vue-barcode-reader";
export default defineComponent({
    components: { StreamBarcodeReader, CameraOutlined },
    emits: ["closed"],
    setup(props, { emit }) {
        const visible = ref(false);

        const openModal = () => {
            visible.value = true;
        };

        const closeModal = () => {
            visible.value = false;
        };

        const onDecode = (text) => {
            visible.value = false;

            emit("closed", text);
        };

        const onLoaded = () => {
            console.log("load");
        };

        return {
            visible,
            openModal,
            onLoaded,
            onDecode,
            closeModal,

            drawerWidth: window.innerWidth <= 991 ? "90%" : "45%",
        };
    },
});
</script>
