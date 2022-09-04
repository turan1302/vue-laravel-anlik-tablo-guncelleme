<template>
    <div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">AD SOYAD</th>
                    <th scope="col">EMAİL</th>
                    <th scope="col">ŞEHİR</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="musteri in musteriler">
                    <td contenteditable="true"  @focus="changeArea" @blur="editArea(musteri.id,'name',$event)">{{ musteri.name }}</td>
                    <td contenteditable="true" @focus="changeArea" @blur="editArea(musteri.id,'email',$event)">{{ musteri.email }}</td>
                    <td contenteditable="true"  @focus="changeArea" @blur="editArea(musteri.id,'sehir',$event)">{{ musteri.sehir }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import {trim} from "lodash";

export default {
    async created() {
        const res = await this.callApi("get", "/api/musteri", {});
        if (res.status == 200) {
            this.musteriler = res.data;
        }
    },
    data() {
        return {
            musteriler: []
        }
    },
    methods : {
        changeArea(e){
            e.target.classList.add("danger");
            e.target.classList.remove("success");
        },
        async editArea(id,column,e){
            var value = e.target.innerText;
            const res = await this.callApi("patch","/api/musteri/"+id+"/update",{
                column : trim(column),
                value : trim(value)
            });

            if (res.status==200){
                e.target.classList.remove("danger");
                e.target.classList.add("success");

                Notification.success("İşlem Başarılı");
            }else{
                var error = res.data.data;
                Notification.error(error);
            }
        }
    }
}
</script>

<style scoped>
.success{
    background-color: #80c000 !important;
    color: white !important;
}

.danger{
    background-color: #ff0026 !important;
    color: white !important;
}
</style>
