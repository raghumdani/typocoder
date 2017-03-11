#include<stdio.h>

int main() {
    int n,i,j,m,a,b,temp=0;
    scanf("%d",&n);
    int d[n];
    for(i=0;i<n;i++)
        d[i]=0;
    scanf("%d",&m);
    for(i=0;i<m;i++)
    {
        scanf("%d%d",&a,&b);
        if(d[a-1]==0&&d[b-1]==0)
        {
            temp++;
            d[a-1]=d[b-1]=temp;
        }
        else if(d[a-1]==0)
        {
            d[a-1]=d[b-1];
        }
        else
            d[b-1]=d[a-1];
    }
    printf("%d\n",temp);
	return(0);
}
