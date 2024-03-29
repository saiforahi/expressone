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
        //step1
        $step1->next=$step2->id;
        $step2->next=$step3->id;
        $step3->next=$step4->id;
        $step4->next=$step5->id;
        $step5->next=$step6->id;
        $step6->next=$step7->id;
        $step7->next=$step8->id;
        $step8->next=$step9->id;
        $step1->save(); $step2->save(); $step3->save(); $step4->save(); $step5->save();$step6->save();$step7->save();$step8->save();
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
