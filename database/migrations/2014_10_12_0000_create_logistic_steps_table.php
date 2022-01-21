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
        $step5=LogisticStep::create(['step_name'=>'Unit received percels','slug'=>'unit-received','previous'=>$step4->id]);
        $step6=LogisticStep::create(['step_name'=>'Ready for internal transit','slug'=>'ready-for-transit','previous'=>$step5->id]);
        //step1
        $step1->next=$step2->id;
        //step2
        $step2->next=$step3->id;
        //step3
        $step3->next=$step4->id;
        $step4->next=$step5->id;
        $step5->next=$step6->id;
        $step1->save(); $step2->save(); $step3->save(); $step4->save(); $step5->save();
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
