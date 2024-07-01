// login screen
import React, { useState } from "react";
import { View, Text, StyleSheet, Image, ImageBackground } from "react-native";
import { Link, useNavigation } from "@react-navigation/native";
import TextInputField from "@/app/components/TextInputField";
import ButtonField from "@/app/components/ButtonField";
import CheckBoxInputField from "@/app/components/CheckBoxInputField";
import { Colors } from "@/constants/Colors";
import Images from "@/constants/Images";
import AsyncStorage from "@react-native-async-storage/async-storage";
import env from "@/constants/env";

const LoginScreen = () => {
  const navigation = useNavigation();

  // FORM DATA
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(false);
  const [error, setError] = useState("");

  const handleLogin = () => {
    const data = {
      email,
      password,
      remember,
    };
    // login to api
    fetch(env.API_URL + "/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        accept: "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then(async (json) => {
        if (json.ERROR) {
          setError(json.ERROR);
          return;
        }
        await AsyncStorage.setItem("user", JSON.stringify(json.user));
        await AsyncStorage.setItem("token", JSON.stringify(json.token));
        navigation.navigate("Dashboard" as never);
      })
      .catch((error) => console.error(error));
  };

  return (
    <View style={styles.container}>
      <ImageBackground
        source={Images.bodyBG}
        resizeMode="cover"
        style={styles.image}
        imageStyle={{ opacity: 0.05 }}
      >
        {/* Logo image */}
        <Image source={Images.LogoLight} style={{ width: 150, height: 150 }} />
        <Text
          style={{ color: Colors.bodyColor, fontSize: 20, marginBottom: 20 }}
        >
          Login
        </Text>
        {error && (
          <Text
            style={{ color: Colors.danger, fontSize: 15, marginBottom: 20 }}
          >
            {error}
          </Text>
        )}
        <TextInputField
          placeholder="Enter email"
          label="Email"
          value={email}
          onChangeText={setEmail}
        />
        <TextInputField
          placeholder="Enter password"
          label="Password"
          type="password"
          value={password}
          onChangeText={setPassword}
        />
        <CheckBoxInputField
          label="Remember me"
          isChecked={true}
          onChange={setRemember}
        />
        <Link
          style={{
            color: Colors.linkColor,
            textAlign: "right",
            width: "100%",
            paddingHorizontal: 10,
            marginVertical: 10,
            marginTop: 10,
          }}
          to="/ForgotPassword"
        >
          <Text>Forgot Password?</Text>
        </Link>
        <ButtonField name="Login" onClick={handleLogin} />

        <View style={{ flexDirection: "row", marginTop: 20 }}>
          <Text style={{ color: Colors.bodyColor }}>
            Don't have an account?
          </Text>
          {/* <Link style={{ color: Colors.linkColor, marginLeft: 5 }} to="/"> */}
          <Text
            style={{
              color: Colors.linkColor,
              marginLeft: 5,
              textDecorationLine: "underline",
              fontWeight: "bold",
            }}
          >
            Request an account
          </Text>
          {/* </Link> */}
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

export default LoginScreen;
