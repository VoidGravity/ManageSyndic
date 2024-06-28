// login screen

import React, { useState } from "react";
import { View, Text, StyleSheet, Image, ImageBackground } from "react-native";
import { Link, useNavigation } from "@react-navigation/native";
import TextInputField from "@/app/components/TextInputField";
import ButtonField from "@/app/components/ButtonField";
import CheckBoxInputField from "@/app/components/CheckBoxInputField";
import { Colors } from "@/constants/Colors";
import Images from "@/constants/Images";

const ResetPasswordScreen = () => {
  const navigation = useNavigation();

  // FORM DATA
  
  const [password, setPassword] = useState("");
  const [passwordConfirmation, setPasswordConfirmation] = useState("");
  const [remember, setRemember] = useState(false);


  const handleLogin = () => {
    const data = {
      password,
      passwordConfirmation,
      remember
    };
    console.log(data);
    navigation.navigate("Dashboard" as never);
  };

  return (
    <View style={styles.container}>
      <ImageBackground source={Images.bodyBG} resizeMode="cover" style={styles.image} imageStyle={{opacity:0.05}}>
      {/* Logo image */}
      <Image
        source={Images.LogoLight}
        style={{ width: 150, height: 150 }}
      />
      <Text style={{ color: Colors.bodyColor, fontSize: 20, marginBottom: 20 }}>
        Create new password
      </Text>
      <Text style={{ color: Colors.bodyColor, fontSize: 14, marginBottom: 20,opacity:.7,marginHorizontal:50, textAlign:'center' }}>
        Your new password must be different from previous used password.
      </Text>
      <TextInputField infos={['Must be at least 8 characters.']} placeholder="Enter password" label="Password" type="password" value={password} onChangeText={setPassword} />
      <TextInputField placeholder="Enter password" label="Confirm Password" type="password" value={passwordConfirmation} onChangeText={setPasswordConfirmation} />
      <CheckBoxInputField label="Remember me" isChecked={true} onChange={setRemember}/>
      <ButtonField name="Reset Password" onClick={handleLogin} />
      
      <View style={{ flexDirection: "row", marginTop: 20 }}>
        <Text style={{ color: Colors.bodyColor }}>Wait, I remember my password...</Text>
        <Link style={{ color: Colors.linkColor, marginLeft: 5 }} to="/">
          <Text style={{
            color: Colors.linkColor,
            marginLeft: 5,
            textDecorationLine: "underline",
            fontWeight: "bold",
          }}>Login</Text>
        </Link>
      </View>
      </ImageBackground>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  image: {
    justifyContent: "center",
    alignItems: "center",
    paddingHorizontal: 20,
    backgroundColor: Colors.bodyBg,
    flex: 1,
    height: "100%",
  },
});

export default ResetPasswordScreen;
