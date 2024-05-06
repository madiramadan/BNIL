USE [WebsiteDB]
GO
/****** Object:  User [apps_chatbot]    Script Date: 06/05/2024 20:50:59 ******/
CREATE USER [apps_chatbot] FOR LOGIN [apps_chatbot] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [apps_websitedb]    Script Date: 06/05/2024 20:51:00 ******/
CREATE USER [apps_websitedb] FOR LOGIN [apps_websitedb] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [user_dwh]    Script Date: 06/05/2024 20:51:00 ******/
CREATE USER [user_dwh] FOR LOGIN [user_dwh] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  User [vendor_websitedb]    Script Date: 06/05/2024 20:51:00 ******/
CREATE USER [vendor_websitedb] FOR LOGIN [vendor_websitedb] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [apps_chatbot]
GO
ALTER ROLE [db_owner] ADD MEMBER [apps_websitedb]
GO
ALTER ROLE [db_owner] ADD MEMBER [user_dwh]
GO
ALTER ROLE [db_owner] ADD MEMBER [vendor_websitedb]
GO
