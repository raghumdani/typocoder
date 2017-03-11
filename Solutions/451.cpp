#include<stdio.h>

int main() {
    int flag=0,i,g;
    scanf("%d",&g);
    int a[g];
    for(i=0;i<g;i++)
        scanf("%d",&a[i]);
    for(i=0;i<g;i++)
    {
        flag=0;
        while(a[i]!=0)
        {
            flag++;
            if(a[i]>=4)
                a[i]/=4;
            else if(a[i]==3)
                a[i]/=3;
            else
                a[i]/=2;
        }
    if(flag%2==0)
        printf("Bob");
    else
        printf("Alice");
    }
	return(0);
}
