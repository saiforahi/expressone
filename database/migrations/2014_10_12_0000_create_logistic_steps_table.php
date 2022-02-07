<?php

use App\Models\LogisticStep;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistic_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('previous')->nullable();
            $table->string('step_name');
            $table->string('slug');
            $table->unsignedBigInteger('next')->nullable();
            $table->timestamps();

            $table->foreign('previous')->references('id')->on('logistic_steps')->onDelete('cascade');
            $table->foreign('next')->references('id')->on('logistic_steps')->onDelete('set null');
        });

        $step1=LogisticStep::create(['step_name'=>'Label create','slug'=>'label-create']);
        $step2=LogisticStep::create(['step_name'=>'approval','slug'=>'approval','previous'=>$step1->id]);
        $step3=LogisticStep::create(['step_name'=>'Courier assigned to pick up','slug'=>'to-pick-up','previous'=>$step2->id]);
        $step4=LogisticStep::create(['step_name'=>'Courier picked up percels','slug'=>'picked-up','previous'=>$step3->id]);
        $step5=LogisticStep::create(['step_name'=>'Courier dropped percels at pickup unit','slug'=>'dropped-at-pickup-unit','previous'=>$step4->id]);
        $step6=LogisticStep::create(['step_name'=>'Unit received percels','slug'=>'unit-received','previous'=>$step5->id]);
        $step7=LogisticStep::create(['step_name'=>'Internal Transit','slug'=>'in-transit','previous'=>$step6->id]);
        $step8=LogisticStep::create(['step_name'=>'Reached at delivery unit','slug'=>'delivery-unit-received','previous'=>$step7->id]);
        $step9=LogisticStep::create(['step_name'=>'Courier assigned for delivery','slug'=>'to-delivery','previous'=>$step8->id]);
        $step10=LogisticStep::create(['step_name'=>'Delivered','slug'=>'delivered','previous'=>$step9->id]);
        $step11=LogisticStep::create(['step_name'=>'Delivery Confirmed','slug'=>'delivery-confirmed','previous'=>$step10->id]);
        $step12=LogisticStep::create(['step_name'=>'Shipment on hold','slug'=>'on-hold','previous'=>$step11->id]);
        $step13=LogisticStep::create(['step_name'=>'Shipment on hold by unit','slug'=>'on-hold-at-unit','previous'=>$step12->id]);
        $step14=LogisticStep::create(['step_name'=>'Shipment returned by recipient','slug'=>'returned-by-recipient']);
        $step15=LogisticStep::create(['step_name'=>'Shipment returned by recipient confirmed','slug'=>'returned-by-recipient-confirmed']);
        $step16=LogisticStep::create(['step_name'=>'Shipment returned sorted','slug'=>'returned-sorted']);
        $step17=LogisticStep::create(['step_name'=>'Shipment returned in transit','slug'=>'returned-in-transit']);
        $step18=LogisticStep::create(['step_name'=>'Shipment returned received by pickup unit admin','slug'=>'returned-received']);
        $step19=LogisticStep::create(['step_name'=>'Shipment handed over to merchant','slug'=>'returned-handover-to-merchant']);
        $step20=LogisticStep::create(['step_name'=>'Patially delivered','slug'=>'partially-delivered']);
        //step1
        $step1->next=$step2->id;
        //step2
        $step2->next=$step3->id;
        //step3
        $step3->next=$step4->id;
        $step4->next=$step5->id;
        $step5->next=$step6->id;
        $step6->next=$step7->id;
        $step7->next=$step8->id;
        $step8->next=$step9->id;
        $step9->next=$step10->id;
        $step10->next=$step11->id;
        $step11->next=$step12->id;
        $step12->next=$step13->id;
        $step13->next=$step14->id;
        
        $step1->save(); $step2->save(); $step3->save(); $step4->save(); $step5->save();$step6->save();$step7->save();$step8->save();
        $step9->save();$step10->save();$step11->save();$step12->save();$step13->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistic_steps');
    }
}
