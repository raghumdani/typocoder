#include<bits/stdc++.h>
using namespace std;
int  main()
{
int i,j,t,count=0;
int a[1000001] ,b[1000001];
memset(a,0,1000001);
a[1]=1;
for(i=2;i*i<1000001;++i)
for(j=2;j*i<=1000001;++j)
a[j*i]=1;
b[1]=0;
for(i=2;i<=1000001;++i)
{
b[i]=b[i-1];
if(a[i]==0)
b[i]++;
}
cin>>t;
while(t--)
{
scanf("%d",&j);
cout<<b[j]<<endl;
}
return 0;
}
