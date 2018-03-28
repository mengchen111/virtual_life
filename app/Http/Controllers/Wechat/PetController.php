<?php

namespace App\Http\Controllers\Wechat;

use App\Models\GameReward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends MiniProgramController
{
    public function interact(Request $request)
    {
        $this->validate($request, [
            'action' => 'required|string|max:255',
        ]);
        $action = $request->input('action');
        $player = $this->player($request);
        DB::transaction(function () use ($player, $action) {
            //创建游戏记录
            $rewardLog = GameReward::create([
                'player_id' => $player->id,
                'action' => $action,
                'reward' => 0.1,    //游戏身价奖励
                'pet_exp' => 0.1,   //宠物经验增加
            ]);

            //增加玩家的游戏身价
            $player->game_points += $rewardLog->reward;
            $player->save();

            //增加玩家的宠物经验
            $player->player_pet->update([
                'pet_exp' => $player->player_pet->pet_exp += $rewardLog->pet_exp,
            ]);
        });

        return $this->res('操作成功');
    }
}
