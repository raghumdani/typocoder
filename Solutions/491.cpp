#include<bits/stdc++.h>
using namespace std;
void scan()
{
int max=0,i,l,n,len,m,lenf,k,v;
set<string> S;
map<int,int> M;
char *a=(char*)malloc(sizeof(char)*11);
string I_str,K;
//I[0]='+';
//cout<<I[0]<<endl;
scanf("%d",&n);
if(n==0)
cout<<"1"<<endl;
else
{
    l=0;
    while(n!=0)
    {
    a[l++]='0'+n%10;
    //cout<<a[l-1]<<" ";
    n=n/10;
    }
//I[l]='\0';
I_str=a;
sort(I_str.begin(),I_str.end());
do
{
    S.insert(I_str);
    //cout<<I_str<<endl;
}while(next_permutation(I_str.begin(),I_str.end()));
set<string>::iterator it;
for(it=S.begin();it!=S.end();it++)
{
K=*it;
v=0;
for(m=0;m<K.length();m++)    
v+=(m+1)*(K[m]-'0');
M[v]++;
if(M[v]>max)
max=M[v];
//cout<<"---"<<v<<endl;
}
//cout<<I_str<<endl;
printf("%d\n",max);
}
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    scan();
}