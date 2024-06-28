// login screen

import React, { useState } from "react";
import { View, Text, StyleSheet, Image, ImageBackground } from "react-native";
import { Link, useNavigation } from "@react-navigation/native";
import TextInputField from "@/app/components/TextInputField";
import ButtonField from "@/app/components/ButtonField";
import CheckBoxInputField from "@/app/components/CheckBoxInputField";
import { Colors } from "@/constants/Colors";
import Images from "@/constants/Images";

const ForgotPasswordScreen = () => {
  const navigation = useNavigation();

  // FORM DATA
  const [email, setEmail] = useState("");


  const sendResetLink = () => {
    const data = {
      email
    };
    console.log(data);
    navigation.navigate("ResetPassword" as never);
  };

  return (
    <View style={styles.container}>
      <ImageBackground source={Images.bodyBG} resizeMode="cover" style={styles.image} imageStyle={{opacity:0.05}}>
      {/* Logo image */}
      <Image
        source={Images.LogoLight}
        style={{ width: 150, height: 150 }}
      />
      <Text style={{ color: Colors.bodyColor, fontSize: 20, marginBottom: 10 }}>
        Forgot Password?
      </Text>
      <Text style={{ color: Colors.bodyColor, fontSize: 14, marginBottom: 20,opacity:.7 }}>
        Reset password with ManageSyndic
      </Text>
      <TextInputField placeholder="Enter email" label="Email" value={email} onChangeText={setEmail} />
      <ButtonField name="Send Reset Link" onClick={sendResetLink} />
      
      <View style={{ flexDirection: "row", marginTop: 20 }}>
        <Text style={{ color: Colors.bodyColor }}>Wait, I remember my password...</Text>
        <Link style={{ color: Colors.linkColor, marginLeft: 5 }} to="/Login">
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

export default ForgotPasswordScreen;
