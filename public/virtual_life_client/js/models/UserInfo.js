var UserInfo=function(){function e(){}return e.setUserInfo=function(r){console.log(r);var n=JSON.parse(r);e.UserId=Number(n.id),e.UserName=n.nickname,e.Openid=n.openid,e.UserSex=1==n.gender?"男":"女",e.Career=n.profession,e.RealName=n.real_name,e.IdentityID=n.identity_id,e.Introduction=n.intro,e.GamePoints=Number(n.game_points),e.Points=Number(n.points),e.TotalPoints=Number(n.rong_yao_points),e.FrozenPoints=Number(n.frozen_points),e.CreateTime=n.created_at,e.Diff=Number(n.zou_shi),e.UserInfoPriceData=n.stocks,e.printUserInfo()},e.printUserInfo=function(){e.UserId=1e3,console.log("[UserID:%d ,NickName:%s ,OpenID:%s ,Sex:%s ,Career:%s ,RealName:%s ,ID:%s ,Introduction:%s ,GamePts:%d ,Points:%d ,FrozenPts:%d ,Create:%s]",e.UserId,e.UserName,e.Openid,e.UserSex,e.Career,e.RealName,e.IdentityID,e.Introduction,e.GamePoints,e.Points,e.FrozenPoints,e.CreateTime)},e.UserInfoPriceData=[],e.UserOrdersYet=[],e.UserOrdersDone=[],e.UserName="",e.UserId=0,e.UserSex="男",e.Career="",e.TotalPrice=0,e.Openid="",e.RealName="",e.IdentityID="",e.Introduction="",e.GamePoints=0,e.Points=0,e.TotalPoints=0,e.FrozenPoints=0,e.CreateTime="",e.UserHead="app/head.jpg",e.Diff=0,e}();